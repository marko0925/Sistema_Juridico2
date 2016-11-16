<?php
require_once __DIR__.'/../dao/config/Connection.php';



function autoload_classes($class_name)
{
    $filename = PROJECTPATH .DS.'src/dao/'. $class_name .'.php';
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
 * Time: 10:42 PM
 */
class TransactionManager
{
    /**
     * @var Connection
     */
    private $transaction;
    /**
     * @var bool
     */
    private $scope;
    /**
     * @var bool
     */
    private $autoComit;

    /**
     * TransactionManager constructor.
     * @param bool $scope
     */
    public function __construct($scope=false)
    {
        $this->scope=$scope;
        $this->autoComit=false;
    }

    /**
     * Metodo bloquea el auto commit
     * @return bool
     */
    public function beginTransaction(){
       return $this->transaction->beginTransaction();
    }

    /**
     * Metodo ejecuta las transacciones en la base de datos
     * @return boolean
     */
    public function flush(){
       return $this->transaction->commit();
    }

    /**
     * Metodo elimina todas las transacciones 
     * @return bool
     */
    public function rollback(){
       return $this->transaction->rollBack();
    }

    /**
     * Metodo genera un nuevo objeto de la clase Connection si $this->scope==false o $this->transaction==null
     */
    private  function generarTransaction(){
        if(!isset($this->transaction) or !$this->scope){
            $this->transaction = new Connection();
        }
    }

    /**
     * @param string $name
     * @return object
     */
    public function getDAO($name){
        $this->generarTransaction();
        $dao= new $name($this->transaction);
        return $dao;
    }

}