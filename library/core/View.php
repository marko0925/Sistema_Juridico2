<?php
class View{
    /*
     Constante que contiene la ubicacion del directorio las view
    */
     private $VIEWS_PATH;
    /*
     Constante que tiene la extencion de las view
    */
    const EXTENSION_VIEW='php';
    /*
     Array contiene las variables que se utilizan en la view
    */
    private $variables;
    /*
     Nombre de la view 
    */
    private $nameView;

    public function __construct($view,$variables){
        $this->VIEWS_PATH=PROJECTPATH.'/src/views/';
        $this->nameView=$view;
        $this->variables=$variables;
    }
    public function setVariable($name,$value){
        $this->addVariables[$name]=$value;
    }
    public function setvariables($lista){
        foreach ($lista as $key => $value) {
            $this->variables[$key]=$value;
        }
    }
    public function setView($view){
        $this->nameView=$view;
    }

    public function render(){
        if(!file_exists($this->VIEWS_PATH . $this->nameView  . "." . self::EXTENSION_VIEW))
        {
            throw new \Exception("Error: El archivo " . $this->VIEWS_PATH .$this->nameView  . "." . self::EXTENSION_VIEW . " no existe", 1);
        }
 
        ob_start();
        extract($this->variables);
        include($this->VIEWS_PATH . $this->nameView . "." . self::EXTENSION_VIEW);
        $str = ob_get_contents();
        ob_end_clean();
        echo $str;
    } 

}