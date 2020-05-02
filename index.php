<!DOCTYPE html>
<html lang="en">
<?php include("includes/header.php"); ?>
<body>
  <?php
  include("includes/sidebar.php");
  $spiceapi = new SpiceApi($config["server"], $config["port"]);

  // Only show main content pages if able to connect to SpiceTools
  if($spiceapi->connect()) {
    switch($_GET["page"]) {
      case "card":
        require("content/card.php");
        break;
      case "coin":
        require("content/coin.php");
        break;
      case "info":
        require("content/info.php");
        break;
      case "keypads":
        require("content/keypads.php");
        break;
      case "buttons":
        require("content/buttons.php");
        break;
      default:
        require("content/home.php");
        break;
    }

    // Disconnect from SpiceTools after everything else has run
    $spiceapi->disconnect();
  } else {
    // Shows when unable to connect to SpiceTools using the IP/port from config
    include("content/connect_error.php");
  }

  include("includes/footer.php");
  ?>
</body>
</html>