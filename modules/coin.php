<?php
function coin_get($api) {
  $request = new Request("coin", "get");
  $response =  $api->execute($request->format());
  return $response[0];
}

function coin_set($api, $amount=NULL) {
  if(is_null($amount)) {
    return coin_get($api);
  } else {
    $request = new Request("coin", "set", $amount);
    return $api->execute($request->format());
    }
}

function coin_insert($api, array $amount=[1]) {
  $request = new Request("coin", "insert", $amount);
  echo "Inserted $amount[0] coin(s).<br>";
  return $api->execute($request->format());
}
?>