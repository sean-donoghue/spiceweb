<?php
class SpiceApi {
  public $server_ip;
  public $port;
  public $password;

  private $connection;
  private $request;
  private $request_id;
  private $cipher;

  function __construct($server_ip, $port, $password="") {
    $this->server_ip = $server_ip;
    $this->port = $port;
    $this->password = $password;
    $this->request_id = 1;
  }

  function connect() {
    if($this->connection = @fsockopen($this->server_ip,$this->port, $errno, $errstr, 30)) {
      return true;
    } else {
      return false;
    }
  }

  function disconnect() {
    fclose($this->connection);
  }

  function rc4($input, $check_id=false) {
    // Only resets the cipher generator if this is the first request since connecting
    if(($check_id) && ($this->request_id == 1)) {
      $this->cipher = rc4_gen($this->password);
    }

    // Constructs ciphertext from plaintext / plaintext from ciphertext
    $output = "";
    for($i = 0; $i < strlen($input); $i++) {
      $output .= chr(ord($input[$i]) ^ $this->cipher->current());
      $this->cipher->next();
    }

    return $output;
  }

  function set_request($module, $function, array $params=[]) {
    // The API expects an appropriately formatted JSON terminated with 0x00
    $json_request = json_encode(Array("id"=>$this->request_id,"module"=>$module,"function"=>$function,"params"=>$params)) ."\x00";
    // RC4 encrypts the request if a password is set
    $this->request = ($this->password === "") ? $json_request : $this->rc4($json_request, true);
    $this->request_id++;
  }

  function send_request() {
    fwrite($this->connection,$this->request);

    $response = "";
    // If no password is set the response can be assumed to end in 0x00
    if($this->password === "") {
      $response = stream_get_line($this->connection, 4096, "\x00");
    } else {
      // If the entire response is encrypted the stream is read one char
      // at a time until decrypting one of the chars results in 0x00
      while(substr($response, -1) !== "\x00") {
        $char = fgetc($this->connection);
        $response .= $this->rc4($char);
      }
      
      // Removes the 0x00 char from the newly decrypted response
      $response = substr($response, 0, strlen($response)-1);
    }

    return json_decode($response)->{"data"};
  }
}
?>