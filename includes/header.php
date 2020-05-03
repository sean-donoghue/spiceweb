<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>SpiceTools API Web Client</title>
  <?php
  include_once("config.php");
  include_once("includes/spiceapi.php");
  include_once("includes/rc4.php");
  include_once("includes/modules.php");
  $incorrect_get_msg = "Incorrect argument(s) given, please try again.";
  ?>
</head>