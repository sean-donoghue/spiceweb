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
	<h2>Keypads</h2>
	<p>
	<?php include("keypad_table.php"); ?>
	</p>
	
	<?php
	if(isset($_GET["key"])) {
		$settings = include("config.php");
		$spiceapi = new SpiceApi($settings["server"], $settings["port"]);
		
		if($spiceapi->connect()) {
			switch($_GET["key"]) {
				case "0":
					keypads_write($spiceapi, [0, "0"]);
					break;
				case "1":
					keypads_write($spiceapi, [0, "1"]);
					break;
				case "2":
					keypads_write($spiceapi, [0, "2"]);
					break;
				case "3":
					keypads_write($spiceapi, [0, "3"]);
					break;
				case "4":
					keypads_write($spiceapi, [0, "4"]);
					break;
				case "5":
					keypads_write($spiceapi, [0, "5"]);
					break;
				case "6":
					keypads_write($spiceapi, [0, "6"]);
					break;
				case "7":
					keypads_write($spiceapi, [0, "7"]);
					break;
				case "8":
					keypads_write($spiceapi, [0, "8"]);
					break;
				case "9":
					keypads_write($spiceapi, [0, "9"]);
					break;
				case "A":
					keypads_write($spiceapi, [0, "A"]);
					break;
				case "D":
					keypads_write($spiceapi, [0, "D"]);
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
	<?php include("footer.php"); ?>
</body>
</html>