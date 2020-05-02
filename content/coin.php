<?php
require_once("./includes/spiceapi.php");
require_once("./modules/coin.php");
?>
<div class="content">
  <h2>Coin</h2>
  <p>Choose an option from below:</p>
  <ul>
    <li><a href='./index.php?page=coin&action=insert&amount=1'>Insert 1 coin</a></lir>
    <li><a href='./index.php?page=coin&action=insert&amount=10'>Insert 10 coins</a></li>
  </ul>
  <ul>
    <li><a href='./index.php?page=coin&action=check'>Check coin queue</a></lir>
    <li><a href='./index.php?page=coin&action=reset'>Reset coin queue to 0</a></lir>
  </ul>
  <?php
  // Check $_GET parameters for valid choices
  if (isset($_GET["action"])) {
    switch($_GET["action"]) {
      // "Insert 1 coin" or "Insert 10 coins" chosen
      case "insert":
        if(isset($_GET["amount"])) {
          switch($_GET["amount"]) {
            // "Insert 1 coin" chosen
            case "1":
              coin_insert($spiceapi, [1]);
              break;
            // "Insert 10 coins" chosen
            case "10":
              coin_insert($spiceapi, [10]);
              break;
            // Unrecognised $_GET values
            default:
              echo $incorrect_get_msg;
              break;
          }
        } else {
          // Unrecognised $_GET values
          echo $incorrect_get_msg;
        }
        break;
      // "Check coin queue" chosen
      case "check":
        echo "Machine currently has " . coin_get($spiceapi) . " coin(s) inserted.";
        break;
      // "Reset coin queue to 0" chosen
      case "reset":
        coin_set($spiceapi, [0]);
        echo "Coin queue has been reset to 0.";
        break;
      // Unrecognised $_GET values
      default:
        echo $incorrect_get_msg;
        break;
    }
  }
  ?>
</div>