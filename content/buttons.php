<?php
require_once("./includes/spiceapi.php");
require_once("./modules/buttons.php");
?>
<div class="content">
  <h2>Buttons</h2>
  <p>
  <?php
  // Preemptively calling buttons_read() to check the status of all buttons can be used
  // to obtain a list of all valid inputs as this is different for every game
  $button_status = buttons_read($spiceapi);

  // Checks $_GET parameters for valid choices
  if(isset($_GET["button"])) {

    // Assumes the input doesn't exist until it is checked against the list returned by SpiceTools
    $button_exists = false;
    foreach($button_status as &$button_array) {
      if ($_GET["button"] === $button_array[0]) {
        $button_exists = true;
      }
    }

    // Sends the button press if it is confirmed to be valid
    if ($button_exists) {
      buttons_write($spiceapi, [[$_GET["button"], 1]]);

      // buttons_write() actually marks the button as pressed, so buttons_write_reset() is called
      // after sleeping for 0.1s to reset all buttons to their unpressed original state
      usleep(100000);
      buttons_write_reset($spiceapi);

      echo "Button press sent: " . $_GET["button"];
      
    } else {
      // Unrecognised $_GET values
      echo $incorrect_get_msg;
    }
  } else {
    // Default message when page is first loaded
    echo "Button press sent: None";
  }
  
  // Prints a list of clickable links for each button reported by SpiceTools
  // to be valid for the current game
  echo "<ul>";
  foreach($button_status as &$button_array) {
    echo "<li><a href='./index.php?page=buttons&button=" . $button_array[0] . "'>" . $button_array[0] . "</a></li>";
  }
  echo "</ul>";
  ?>
  </p>
</div>