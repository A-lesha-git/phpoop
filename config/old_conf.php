<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

define('ROOT_DIR', realpath(__DIR__ . '/../'));
define('CONTROLLER_DIR', ROOT_DIR . "/controller");
define("CONTROLLERS_NAMESPACE", "\\app\\controllers\\");
define("TEMPLATES_DIR", ROOT_DIR . "/views/");
