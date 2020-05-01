<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>
<body>
	<?php include("sidebar.php") ;?>
	<div class="content">
	<h2>Buttons</h2>
	<p>
	<?php
	$settings = include("config.php");
	$spiceapi = new SpiceApi($settings["server"], $settings["port"]);
	
	if($spiceapi->connect()) {
		$button_status = buttons_read($spiceapi);
		if(isset($_GET["button"])) {
			$button_exists = false;
			foreach($button_status as &$button_array) {
				if ($_GET["button"] === $button_array[0]) {
					$button_exists = true;
				}
			}
			if ($button_exists) {
				buttons_write($spiceapi, [[$_GET["button"], 1]]);
				usleep(100000);
				buttons_write_reset($spiceapi);
				echo "Button press sent: " . $_GET["button"];
				
			} else {
				echo "Incorrect argument(s) given, please try again.";
			}
		} else {
			echo "Button press sent: None";
		}
		
		echo "<ul>";
		foreach($button_status as &$button_array) {
			echo "<li><a href='./buttons.php?button=" . $button_array[0] . "'>" . $button_array[0] . "</a></li>";
		}
		echo "</ul>";
		
		$spiceapi->disconnect();
	} else {
		echo "No connection made, server probably unavailable or offline.";
	}
	?>
	</p>
	</div>
	<?php
	include("footer.php"); 
	?>
</body>
</html>