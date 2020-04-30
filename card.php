<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>SpiceTools API Web Client</title>
	<?php
	include("spiceapi.php");
	include("request.php");
	include("modules.php");
	?>
</head>
<body>
	<?php include("sidebar.php") ;?>
	<div class="content">
	<h2>Card</h2>
	<p>Default card ID as set in config.php:<br>
	<?php
	$settings = include("config.php");
	echo $settings["card1"];
	?>
	</p>
	<ul>
		<li><a href='./card.php?insert=p1'>Insert into P1 side</a></lir>
		<li><a href='./card.php?insert=p2'>Insert into P2 side</a></li>
	</ul>
	<?php
	if (isset($_GET["insert"])) {
		$spiceapi = new SpiceApi($settings["server"], $settings["port"]);
		if ($spiceapi->connect()) {
			switch($_GET["insert"]) {
				case "p1":
					card_insert($spiceapi, [0, $settings["card1"]]);
					break;
				case "p2":
					card_insert($spiceapi, [1, $settings["card1"]]);
					break;
				default:
					echo "Incorrect argument(s) given, please try again.";
					break;
			}
			$spiceapi->disconnect();
		} else {
			echo "No connection made, server probably unavailable or offline.";
		}
	}
	?>
	</div>
	<?php
	include("footer.php"); 
	?>
</body>
</html>