<?php
/**
 * 
 */
require_once __DIR__.'/../factory/TransactionManager.php';
class ClienteService{

    public function registrar(){
           try {
           //manager transaction
           $transaccion = new TransactionManager();
           $transaccion->beginTransaction();
           /**
            * @var UsuarioDAO $usuarioDAO
            */
           $usuarioDAO=$transaccion->getDAO('UsuarioDAO');
           $usuarioDAO->saved();
           $usuarioDAO->
           //guardar
           $transaccion->flush();
       }
       catch (Exception $e){
           if(isset($transaccion)){
               //eliminar transaction
               $transaccion->rollback();
           }
       }
    }
    
    public function listar(){
        try{
            $manager = new  TransactionManager(true);
            $dao=$manager->getDAO('ClienteDAO');
        }
        finally{
            if(!isset($manager)){
                $manager->close();
            }
        }

        return $dao->listar();
    }
}