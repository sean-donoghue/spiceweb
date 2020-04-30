<?php
/*
	The following functions all relate to the numerical keypads on both the P1 and P2 side of the machine.
	The $api parameter in each function must be a SpiceApi object with an active connetion.
	Acceptible inputs are "0" through "9" for numbers, "A" for the 00 key and "D" for the decimal key.
	
	keypads_write()	->	emulates inputting a sequence of key presses to either keypad.
						$params[0] as an integer indicates which keypad to use, 0 for Player 1 or 1 for Player 2
						$params[1] as a string indicates the sequence of key presses to inputs
	
	keypads_set()	->	allows certain keys to be marked as pressed.
						calling this function will always override any previous pressed keys and mark all as unpressed.
						$params[0] is the same usage as keypads_write()
						$params[1] and onwards must be chars representing which keys to set, e.g. '0', '1', '2'.
						
	keypads_get()	->	returns an array of the keys that are currently pressed, such as with keypads_set()
						$pad is the same as $params[0] in the other two functions of this file
*/

function keypads_write($api, $params) {
	$request = new Request("keypads", "write", $params);
	$api->execute($request->format());
}

function keypads_set($api, $params) {
	$request = new Request("keypads", "set", $params);
	$api->execute($request->format());
}

function keypads_get($api, $pad) {
		$request = new Request("keypads", "get", $pad);
		$response = $api->execute($request->format());
		return $response;
}
?>