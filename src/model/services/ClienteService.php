<?php
require_once __DIR__.'/../';
/**
 * 
 */
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
           $usuarioDAO->saved($dto);
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
        $manager = new  TransactionManager();
        $dao=$manager->getDAO('ClienteDAO');
        return $dao->listado();
    }
}