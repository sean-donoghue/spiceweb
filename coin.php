<!DOCTYPE html>
<html lang="en">
<?php include("head.php"); ?>
<body>
	<?php include("sidebar.php") ;?>
	<div class="content">
	<h2>Coin</h2>
	<p>Choose an option from below:<br>
	<?php
	$settings = include("config.php");
	?>
	</p>
	<ul>
		<li><a href='./coin.php?action=insert&amount=1'>Insert 1 coin</a></lir>
		<li><a href='./coin.php?action=insert&amount=10'>Insert 10 coins</a></li>
	</ul>
	<ul>
		<li><a href='./coin.php?action=check'>Check coin queue</a></lir>
		<li><a href='./coin.php?action=reset'>Reset coin queue to 0</a></lir>
	</ul>
	<?php
	if (isset($_GET["action"])) {
		$spiceapi = new SpiceApi($settings["server"], $settings["port"]);
		if ($spiceapi->connect()) {
			switch($_GET["action"]) {
				case "insert":
					if(isset($_GET["amount"])) {
						switch($_GET["amount"]) {
						case "1":
							coin_insert($spiceapi, [1]);
							break;
						case "10":
							coin_insert($spiceapi, [10]);
							break;
						default:
							echo "Incorrect argument(s) given, please try again.";
							break;
						}
					} else {
						echo "Incorrect argument(s) given, please try again.";
					}
					break;
				case "check":
					echo "Machine currently has " . coin_get($spiceapi) . " coin(s) inserted.";
					break;
				case "reset":
					coin_set($spiceapi, [0]);
					echo "Coin queue has been reset to 0.";
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