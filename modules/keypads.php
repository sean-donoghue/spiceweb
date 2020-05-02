<?php
function keypads_write($api, $params) {
  $api->set_request("keypads", "write", $params);
  $api->send_request();
}

function keypads_set($api, $params) {
  $api->set_request("keypads", "set", $params);
  $api->send_request();
}

function keypads_get($api, $pad) {
  $api->set_request("keypads", "get", $params);
  return $api->send_request();
}
?>