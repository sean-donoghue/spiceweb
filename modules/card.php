<?php
/*
    The card module of the SpiceTools API actually only has one function to call, which allows you to
	emulate inserting an eAmuse card into either the Player 1 or Player 2 side of the machine.
	Might be useful keeping this separate in case it gets more calls in the future.
	
	array $params must include two specific items:
	[0]: an integer denoting which player side to insert the card into (0 for Player 1, 1 for Player 2)
	[1]: a 16 character hex string representing an eAmuse card ID
*/

function card_insert($api, $params) {
	$request = new Request("card", "insert", $params);
	echo "Inserted card ID $params[1] into Player " . ($params[0] + 1) . " side.<br>";
	return $api->execute($request->format());
}
?>