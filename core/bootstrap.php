<?php
define ('ROOT_URL', $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']));

require 'app/Models/Tasks.php';

require 'core/database.php';
require 'core/helpers.php';
require 'core/Router.php';

// require 'app/Models/Example.php';
