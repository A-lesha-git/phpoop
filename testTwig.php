<?php
//$loader =new Twig_SimpleFilter();


error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'vendor/autoload.php';
$var = "its my test variable";

$twig = new Twig_Environment(new Twig_Loader_Filesystem('views'), array(
    'cache' => 'cache',
));

$template = $twig->load('layout.twig');
echo $template->render(array('var'=>$var));


