<?php
class SpiceApi {
  public $server_ip;
  public $port;

  private $connection;
  private $request;

  function __construct($server_ip, $port) {
    $this->server_ip = $server_ip;
    $this->port = $port;
  }

  function connect() {
    error_reporting(1);
    if($this->connection = pfsockopen($this->server_ip,$this->port)) {
        error_reporting(2);
        return true;
      } else {
        error_reporting(2);
        return false;
      }
  }

  function disconnect() {
    fclose($this->connection);
  }

  function set_request($module, $function, array $params=[]) {
    $this->request = json_encode(Array("id"=>1,"module"=>$module,"function"=>$function,"params"=>$params)) . "\x00";
  }

  function send_request() {
    fwrite($this->connection,$this->request);
    $data = json_decode(stream_get_line($this->connection, 0, "\x00"));
    return $data->{"data"};
  }
}
?>