<?php

/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 16/11/2016
 * Time: 3:54 PM
 */
require_once __DIR__.'/../../library/core/BaseController.php';
class ProcesoController extends BaseController
{
    public  function __construct()
    {
        parent::__construct();
    }

    public function getFormularioRegistro(){
        $this->setView('proceso/formularioRegistroProceso');
    }

}