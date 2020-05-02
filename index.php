<!DOCTYPE html>
<html lang="en">
<?php include("includes/header.php"); ?>
<body>
  <?php
  include("includes/sidebar.php");

  $spiceapi = new SpiceApi($config["server"], $config["port"]);
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
    $spiceapi->disconnect();
  } else {
    include("content/connect_error.php");
  }

  include("includes/footer.php");
  ?>
</body>
</html>