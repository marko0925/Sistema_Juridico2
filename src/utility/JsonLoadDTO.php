<?php

/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 10/07/2016
 * Time: 12:32 AM
 */
class JsonLoadDTO
{
    private $structure;
    private $jsonDecode;

    /**
     * JsonLoadDTO constructor.
     * @param null $json
     * @param null $class
     */
    public function __construct($json=null,$class=null)
    {
        $this->structure=$class;
    }

    /**
     * @param $name
     * @return DTO
     */
    public function get($name){
        $val=$this->structure[$name];
        switch ($val){
            case 'all':
                $this->getGeneral($name);
                break;
            default:
                $this->getSpecific($name);
        }

    }

    /**
     * @return array
     */
    public function getAll(){
        $array=array();
        foreach ($this->structure as $className){
           $array[$className]= $this->get($className);
        }
        return $array;
    }
    private function getSpecific($name){
        $obj= $this->jsonDecode->$name();
        $model=$this->structure[$name];
        $dto=$this->getDispatch($name);
        foreach ($model as $property){
            $property='set'.ucwords($property);
            call_user_func_array(array($dto,$property),array($obj));
        }
        return $dto;

    }
    private function getGeneral($name){
        $dto=$this->getDispatch($name);
        $obj=$this->jsonDecode->$name();
        foreach ($obj as $key=>$val){
            $property='set'.ucwords($key);
            call_user_func_array(array($dto,$property),array($val));
        }
        return $dto;

    }
    private function getDispatch($className){
        require_once "__DIR__/../model/dto/.$className.php";
        $dispatch= new $className();
        return $dispatch;
    }


}