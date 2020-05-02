<?php
require_once("./includes/spiceapi.php");
require_once("./modules/info.php");

// Iterates through the associative array returned by SpiceTools
// when info_get() is called and prints a table
function info_print($info) {
  echo "<table>";
	foreach($info as $field=>$value) {
		if (!is_array($value)) {
			echo "<tr><td class='info-field'>$field:</td><td class='info-value'>$value</td></tr>";
		} else {
			echo "<tr><td class='info-field'>$field:</td><td class='info-value'>";
			foreach($value as &$arg) {
				echo "$arg ";
      }
      echo "</td></tr>";
		}
  }
  echo "</table>";
}
?>
<div class="content">
  <h2>Info</h2>
  <p>Please choose which info to view:</p>
  <ul>
    <li><a href='./index.php?page=info&info=avs'>AVS</a></lir>
    <li><a href='./index.php?page=info&info=launcher'>Launcher</a></li>
    <li><a href='./index.php?page=info&info=memory'>Memory</a></li>
  </ul>
  <br>
  <?php
  // Check $_GET parameters for valid choices
  if(isset($_GET["info"])) {
    switch($_GET["info"]) {
      // "AVS" was chosen
      case "avs":
        $info = info_get($spiceapi, "avs");
        info_print($info);
        break;
      // "Launcher" was chosen
      case "launcher":
        $info = info_get($spiceapi, "launcher");
        info_print($info);
        break;
      // "Memory" was chosen
      case "memory":
        $info = info_get($spiceapi, "memory");
        info_print($info);
        break;
      // Unrecognised $_GET values
      default:
        echo $incorrect_get_msg;
    }
  }
  ?>
</div>