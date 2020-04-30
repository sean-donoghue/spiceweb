<?php
function buttons_read($api) {
		$request = new Request("buttons", "read");
		$response = $api->execute($request->format());
		return $response;
}

function  buttons_write($api, $params) {
	$request = new Request("buttons", "write", $params);
	$api->execute($request->format());
}

function  buttons_write_reset($api, $params=[]) {
	$request = new Request("buttons", "write_reset", $params);
	$api->execute($request->format());
}
?>