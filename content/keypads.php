<?php
require_once("./includes/spiceapi.php");
require_once("./modules/keypads.php");
?>
<div class="content">
  <h2>Keypads</h2>
  <p>
  <?php
  // keypad_table.php uses the $player array to form parts of the URL for each button, thus
  // the array is changed before each include to make each keypad have different functions
  $player = Array("P1", "0");
  require("./includes/keypad_table.php");
  $player = Array("P2", "1");
  require("./includes/keypad_table.php");
  ?>
  </p>
  <?php

  // Get "player" as int, default to player 1 if not specified
  $player_number = isset($_GET["player"]) ? (int)$_GET["player"] : 0;

  // Check $_GET parameters for valid choices
  if(isset($_GET["key"])) {
    switch($_GET["key"]) {
      case "0":
        keypads_write($spiceapi, [$player_number, "0"]);
        break;
      case "1":
        keypads_write($spiceapi, [$player_number, "1"]);
        break;
      case "2":
        keypads_write($spiceapi, [$player_number, "2"]);
        break;
      case "3":
        keypads_write($spiceapi, [$player_number, "3"]);
        break;
      case "4":
        keypads_write($spiceapi, [$player_number, "4"]);
        break;
      case "5":
        keypads_write($spiceapi, [$player_number, "5"]);
        break;
      case "6":
        keypads_write($spiceapi, [$player_number, "6"]);
        break;
      case "7":
        keypads_write($spiceapi, [$player_number, "7"]);
        break;
      case "8":
        keypads_write($spiceapi, [$player_number, "8"]);
        break;
      case "9":
        keypads_write($spiceapi, [$player_number, "9"]);
        break;
      case "A":
        keypads_write($spiceapi, [$player_number, "A"]);
        break;
      case "D":
        keypads_write($spiceapi, [$player_number, "D"]);
        break;
      // Unrecognised $_GET values
      default:
        echo $incorrect_get_msg;
        break;
    }
  }
  ?>
</div>