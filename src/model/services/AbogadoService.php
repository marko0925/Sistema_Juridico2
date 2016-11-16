<?php
require_once __DIR__ . '/../factory/TransactionManager.php';
require_once __DIR__.'/../dao/AbogadoDAO.php';
/**
 * Created by PhpStorm.
 * User: McBro
 * Date: 16/11/2016
 * Time: 4:50 PM
 */
class AbogadoService
{

    public function registrar($dto)
    {
        try {
            $transaccion = new TransactionManager();
            $transaccion->beginTransaction();

            $abogadoDAO = $transaccion->getDAO("AbogadoDAO");
            $abogadoDAO->registrar();
        } catch (Exception $e) {
            if (isset($transaccion)) {
                $transaccion->rollback();
            }
        }
    }
}