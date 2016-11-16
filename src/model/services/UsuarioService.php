<?php
include_once __DIR__.'/../factory/TransactionManager.php';

/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 08/07/2016
 * Time: 08:19 PM
 */
class UsuarioService
{
    /**
     * @param $dto UsuarioDTO
     */
   public function registrarUsuario($dto){
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

}