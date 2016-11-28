<?php
require_once 'View.php';

class BaseController{
    /**
     * @var View
     */
    protected $view;
    /**
     * @var string
     */
    private $body;
    /**
     * BaseController constructor.
     */
    protected function __construct(){
    }

    /**
     * @param string $view
     * @param array $array
     * @throws Exception
     */
    protected function setView($view,$array=null){
        if(!isset($array)){
            $array=array();
        }
        $this->view= new View($view,$array);
        $this->view->render();
    }

    /**
     * Metodo retorna lo que trae  XmlHTTPRequest
     * @return string
     */
    protected function getBody(){
        if (null === $this->body) {
            $this->body = @file_get_contents('php://input');
        }
        return $this->body;
    }

    /**
     * Redirecciona a otro controlador
     * @param $url
     */
    protected function redirec($url){
        header ('Location: http://localhost:8081/'.$url);
    }
}