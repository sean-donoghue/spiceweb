<?php
function coin_get($api) {
  $api->set_request("coin", "get");
  return $api->send_request()[0];
}

function coin_set($api, $amount=NULL) {
  if(is_null($amount)) {
    return coin_get($api);
  } else {
    $api->set_request("coin", "set", $amount);
    $api->send_request();
    }
}

function coin_insert($api, array $amount=[1]) {
  $api->set_request("coin", "insert", $amount);
  $api->send_request();
  echo "Inserted $amount[0] coin(s).<br>";
}
?>