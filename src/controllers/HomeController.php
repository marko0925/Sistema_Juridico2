<?php
require_once __DIR__.'/../../library/core/BaseController.php';
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
            $this->redirec('session/login');
            exit();
        }
        else{
            $this->setView('index');
        }
    }

    public function postRegistrar(){

    }

}
