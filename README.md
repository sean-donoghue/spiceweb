# spiceweb
A web client for use with the API built into SpiceTools. You can demo the UI [here](https://www.sean-donoghue.com/spiceweb-demo/) to see how it works.

## Features
* Connect to a running instance of SpiceTools that has the API enabled on a specified hostname/port.
* Supports encrypted connections using a password that has been set in spicecfg.exe.
* Insert coin(s) into the machine, and query how many coins have yet to be processed by the machine.
* Insert an eAmuse card into either card reader of the machine, using a card ID specified in the config.
* Signal presses on the numerical keypad for entering PIN during login or accessing certain game features.
* Send button presses to the machine from a list of valid inputs that dynamically populates according to the game that is currently running.
* View information about the machine such as game information, SpiceTools version, launch arguments, and memory usage.

## Config
There are currently four settings that can be changed with config.php:
* server: The IP address or hostname of the machine running SpiceTools. You can leave this as 127.0.0.1 or localhost if you're hosting this on the same machine as SpiceTools, e.g. with WAMP or XAMPP.
* port: The port that the SpiceTools API is listening on.
* password: If you've set a password for the connection in spicecfg.exe, enter it here. Otherwise leave this blank.
* card1: The card ID to use when inserting a card into the reader. Must be a valid 16-character hex string, preferably starting with "E004" or "012E". SpiceTools can generate this for you.

## To-do:
* Expand upon current features (multiple card IDs etc.).
* Add features for the other modules supported by the API.