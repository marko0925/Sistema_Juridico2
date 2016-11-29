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

    public function getLogin(){
        $this->setView('login');
    }


    public function getInicioSession(){
        $info=SesionService::inicioSesion(2,'1234');
        if($info['estado']){
            $this->redirec('');
            exit();
        }
        else{
            //imprime el error de inicio de session
           echo $info['mensaje'];
        }

    }

    public function getCerrarSession(){
        if(SesionService::cerrar()){
            $this->redirec('session/login');
            exit();
        }
        echo 'error al cerrar session';
    }


}
