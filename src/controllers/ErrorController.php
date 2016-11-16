<?php
include_once __DIR__.'/../../library/core/BaseController.php';
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 08/07/2016
 * Time: 10:25 AM
 */
class ErrorController extends BaseController
{
    public function __construct(){
        parent::__construct();
    }

    public function error404(){
        $this->setView('error/view404');
    }

}