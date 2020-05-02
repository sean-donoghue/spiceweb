<?php
function buttons_read($api) {
  $api->set_request("buttons", "read");
  return $api->send_request();
}

function  buttons_write($api, $params) {
  $api->set_request("buttons", "write", $params);
  $api->send_request();
}

function  buttons_write_reset($api, $params=[]) {
  $api->set_request("buttons", "write_reset", $params);
  $api->send_request();
}
?>