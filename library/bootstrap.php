<?php
 //require_once (PROJECTPATH . DS . 'config' . DS . 'config.php');
//require_once (PROJECTPATH . DS . 'library' . DS . 'shared.php');

/** Check if environment is development and display errors **/
function setReporting() {
if (DEVELOPMENT_ENVIRONMENT == true) {
    error_reporting(E_ALL);
    ini_set('display_errors','On');
} else {
    error_reporting(E_ALL);
    ini_set('display_errors','Off');
    ini_set('log_errors', 'On');
    ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
}
}

/** Check for Magic Quotes and remove them **/
 
function stripSlashesDeep($value) {
    $value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
    return $value;
}
 
function removeMagicQuotes() {
if ( get_magic_quotes_gpc() ) {
    $_GET    = stripSlashesDeep($_GET);
    $_POST   = stripSlashesDeep($_POST  );
    $_COOKIE = stripSlashesDeep($_COOKIE);
}
}

/** Check register globals and remove them **/
 
function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}


/**
     * [parseUrl Parseamos la url en trozos]
     * @return [Array] [description]
     */
    function parseUrl(){
        $array=null;
        switch (isset($_GET["url"])) {
            case true:
             //$array= explode("/", filter_var(rtrim($_GET["url"], "/"), FILTER_SANITIZE_URL));
             $array= explode("/",$_GET["url"]);
             break;
            default:
             $array= array('home');
            break;
        }
        return $array;
    }

/** Main Call Function **/
 
function callHook() { 
    $urlArray = parseUrl();
 
    $controller = $urlArray[0];
    array_shift($urlArray);
    //mejorar esta desordenado
    if(isset($urlArray[0])){
        if(empty($urlArray[0])){
            $action='index';
        }
        else{
             $action = $urlArray[0];
        }
      
    }
    else{
      $action='index';
    }    
    
    array_shift($urlArray);
    
    $queryString = $urlArray;
 
    $controllerName = $controller;
    $controller = ucwords($controller);
    $controller .= 'Controller';
    $method=strtolower($_SERVER['REQUEST_METHOD']);
    $action= $method.ucwords($action);
    
    if(method_exists($controller,$action)){
        $dispatch = new $controller();
        call_user_func_array(array($dispatch,$action),$queryString);
    }
}

//autoload con namespaces
function autoload_classes($class_name)
{
    $filename = PROJECTPATH .DS.'src/controllers/'. str_replace('\\', '/', $class_name) .'.php';
    if(is_file($filename))
    {
        include_once $filename;
    }
}
//registramos el autoload autoload_classes
spl_autoload_register('autoload_classes');

removeMagicQuotes();
unregisterGlobals();
callHook();