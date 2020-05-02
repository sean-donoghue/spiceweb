<?php
/*
	The info module of the SpiceTools API has three different functions, but since their calls and responses
	are so similar they can be implemented using a single PHP function that checks the argument $function
	to check which one to call.
	
	info_get($api, "avs") -> returns info about the game currently running
	info_get($api, "launcher") -> returns info about the version of SpiceTools the game is running on,
									and any arguments passed during launcher
	info_get($api, "memory") -> returns info on system memory usage
*/

function info_get($api, $function) {
	if(($function!="avs") && ($function!="launcher") && ($function!="memory")) {
		return null;
	} else {
		$request = new Request("info", $function);
		$response = $api->execute($request->format());
		return get_object_vars($response[0]);
	}
}
?>