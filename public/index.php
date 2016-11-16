<?php 
define('PROJECTPATH',dirname(dirname(__FILE__)));
define('DS','/'); 
require_once (PROJECTPATH . DS . 'library' . DS . 'FrontController.php');

$app= new FrontController();
$app->run();

//autoload con namespaces
