<?php


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


/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 07/07/2016
 * Time: 09:47 PM
 */
class FrontController
{
    /**
     * @var string
     */
    private $action;
    /**
     * @var string
     */
    private $method;
    /**
     * @var string
     */
    private $controller;
    /**
     * @var array
     */
    private $parametros;

    public function __construct()
    {
        $this->ini();

    }

    /**
     * @return array
     */
    private function parseUrl(){
        $result=null;
        switch (isset($_GET['url'])){
            case true:
                $result=explode('/',$_GET['url']);

                break;
            default:
                $result=array('Home','Index');
        }
        return $result;
    }

    private function ini(){
        $urlArray=$this->parseUrl();
        $this->calcularMethod();
        $urlArray=$this->calcularController($urlArray);
        $this->parametros=$this->calcularAction($urlArray);
    }

    /**
     * Metodo genera el controlador que solicita la request
     * @param $urlArray array
     * @return array
     */
    private function  calcularController($urlArray){
        $controller=$urlArray[0];
        array_shift($urlArray);
        $controller=ucwords($controller);
        $controller.='Controller';
        $this->controller=$controller;
        return $urlArray;
    }

    /**
     * @param $urlArray array
     * @return array
     */
    private function calcularAction($urlArray){
        switch (isset($urlArray[0])){
            case true:
                $action=$urlArray[0];
                array_shift($urlArray);
                $action=trim($action);
                switch ($action){
                    case true:
                       $this->action=$this->method.ucwords($action);
                        break;
                    default:
                }
                break;
            default:
                $this->controller='ErrorController';
                $this->action='error404';
        }
        return $urlArray;
    }

    /**
     * Metodo retorna el método de petición empleado para acceder a la página
     */
    private function calcularMethod(){
       $this->method=strtolower($_SERVER['REQUEST_METHOD']);
    }


    public function run(){
        switch (method_exists($this->controller,$this->action)){
            case true:
                $dispatch = new $this->controller();
                call_user_func_array(array($dispatch,$this->action),$this->parametros);
                break;
            default:
                $controller='ErrorController';
                $dispatch = new $controller();
                call_user_func_array(array($dispatch,'error404'),$this->parametros);

        }

    }
}
