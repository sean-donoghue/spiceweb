<?php
require_once("./config.php");
require_once("./includes/spiceapi.php");
require_once("./modules/card.php");
?>
<div class="content">
  <h2>Card</h2>
  <p>Default card ID as set in config.php:<br>
  <?php echo $config["card1"]; ?></p>
  <ul>
    <li><a href='index.php?page=card&insert=p1'>Insert into P1 side</a></lir>
    <li><a href='index.php?page=card&insert=p2'>Insert into P2 side</a></li>
  </ul>
  <?php
  // Checks $_GET parameters for valid choices
  if (isset($_GET["insert"])) {
    switch($_GET["insert"]) {
      // "Insert into P1 side" chosen
      case "p1":
        card_insert($spiceapi, [0, $config["card1"]]);
        break;
      // "Insert into P2 side" chosen
      case "p2":
        card_insert($spiceapi, [1, $config["card1"]]);
        break;
      // Unrecognised $_GET values
      default:
        echo $incorrect_get_msg;
        break;
    }
  }
  ?>
  </div>