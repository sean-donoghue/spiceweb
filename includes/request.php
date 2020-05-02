<?php
/*
  The SpiceTools API expects requests to be sent as a UTF-8 encoded JSON,
  terminated with a null character or 0x00.

  Example request (whitespace will be collapsed):
  {
    "id": 1,
    "module": "coin",
    "function": "insert",
    "params": [1]
  }

  The "id" field can be used to link responses received to their respective
  requests by giving each request a unique "id", but this is not used here as
  everything functions fine without doing so.
*/

class Request {
  public $id;
  public $module;
  public $function;
  public $params;

  function __construct($module, $function, array $params=[]) {
    $this->id = 1;
    $this->module = $module;
    $this->function = $function;
    $this->params = $params;
  }

  // Combines all variables of the Request object into a JSON terminated with
  // a null character 0x00, and returns the resulting JSON.
  function format() {
    $json = json_encode(get_object_vars($this)) . "\x00";
    return $json;
  }
}
?>