<?php
// Allows for connection to and interaction with a SpiceTools client over TCP.
class SpiceApi {
  public $server_ip;
  public $port;
  public $connection;

  function __construct($server_ip, $port) {
    $this->server_ip = $server_ip;
    $this->port = $port;
  }

  // If pfsockopen() fails a warning is shown to the user, this is temporarily
  // suppressed as the error is assumed to be due to a server not being available.
  // Returns true if conncetion is made, or false otherwise.
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

  // Responsible for actually sending the JSON request to the API, and returning
  // the response.
  // Expects $reqeust to be a Request object.
  // The response from the API is in the same format as the request, but the only
  // useful information is in the "data" field of the JSON, so everything else
  // is stripped.
  function execute($request) {
    fwrite($this->connection,$request);
    $response_data = stream_get_line($this->connection, 0, "\x00");
    $response_data = json_decode($response_data);
    return $response_data->{"data"};
  }
}
?>