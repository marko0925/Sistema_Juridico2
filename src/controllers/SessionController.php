<?php
require_once __DIR__.'/../../library/core/BaseController.php';
require_once __DIR__.'/../model/services/SesionService.php';
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 28/11/2016
 * Time: 3:48 PM
 */
class SessionController extends BaseController
{
    public  function __construct()
    {
        parent::__construct();
    }

    public function getInicioSession(){
        $info=SesionService::inicioSesion(1,'1234');
        if($info['estado']){
            $this->redirec('index');
            exit();
        }
        else{
            //imprime el error de inicio de session
           echo $info['mensaje'];
        }

    }

    public function geCerrarSession(){
        if(SesionService::cerrar()){
            $this->redirec('session/login');
            exit();
        }
        echo 'error al cerrar session';
    }


}