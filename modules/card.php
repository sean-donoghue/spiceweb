<?php
function card_insert($api, $params) {
  $api->set_request("card", "insert", $params);
  $api->send_request();
  echo "Inserted card ID $params[1] into Player " . ($params[0] + 1) . " side.<br>";
}
?>