<?php
function info_get($api, $function) {
  if(($function!="avs") && ($function!="launcher") && ($function!="memory")) {
    return null;
  } else {
    $api->set_request("info", $function);
    return get_object_vars($api->send_request()[0]);
  }
}
?>