<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once '../base/App.php';



//spl_autoload_register([new \app\services\Autoload(), 'loadClass']);


 \app\base\App::call()->run();