# spiceweb
A web client for use with the API built into SpiceTools. You can demo the UI [here](https://www.sean-donoghue.com/spiceweb-demo/) to see how it works.

## Features
* Connect to a running instance of SpiceTools that has the API enabled on a specified hostname/port.
* Emulate inserting  coin(s) into the machine, and manage the queue of unprocessed coins.
* Emulate inserting an eAmuse card into either card reader of the machine, using a card ID specified in the config.
* Emulate presses on the numerical keypad (currently P1 side only) for entering PIN during login or accessing certain settings.
* Send button presses to the machine from a list of valid inputs that dynamically populates according to the game that is currently running.
* View information about the machine such as game information, SpiceTools version, launch arguments, and memory usage.

## Config
There are currently only three settings that can be changed with config.php:
* server: The IP address or hostname of the machine running SpiceTools.
* port: The port that the SpiceTools API is listening on.
* card1: The card ID to use when inserting a card into the reader. Must be a valid 16-character hex string, preferably starting with "E004" or "012E".

## To-do:
* General code cleanup and commenting.
* Expand upon current features (P2 keypad, multiple card IDs etc.).
* Add features for the other modules supported by the API.
