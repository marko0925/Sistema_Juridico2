<?php
require_once __DIR__.'/../../library/core/BaseController.php';
require_once __DIR__.'/../model/Services/SesionService.php';
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 07/07/2016
 * Time: 10:11 AM
 */
class HomeController extends BaseController
{
    public  function __construct()
    {
        parent::__construct();
    }

    public function getIndex(){
        if(SesionService::verificarRol()=='inactivo'){
            $this->setView('login');
            exit();
        }
        else{
            $this->setView('index');
        }
    }
    public function postIndex(){
      SesionService::inicioSesion($_POST['usuario'],$_POST['contrasena']);
      if(SesionService::verificarRol()=='inactivo'){
          $this->setView('login',array("mens"=>"Datos incorrectos vuelva a intentar"));
          exit();
      }else{
          $this->setView('index');
      }
    }
    public function  getSalir(){
      SesionService::cerrar();
      $this->redirec('#');
    }
    public function postRegistrar(){

    }

}
