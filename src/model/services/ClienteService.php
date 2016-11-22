<?php
require_once __DIR__ . '/../factory/TransactionManager.php';

class ClienteService
{

    public function registrar($dto)
    {
        try {
            //manager transaction
            $manager = new TransactionManager(true);
            /**
             * @var ClienteDAO
             */
            $dao = $manager->getDAO('ClienteDAO');
            $dao->registrar($dto);
            //guardar
            $manager->flush();
        } catch (Exception $e) {
            print $e;
            if (isset($manager)) {
                //eliminar transaction
                $manager->rollback();
            }
        } finally {
            if (isset($manager)) {
                $manager->close();
            }

        }
    }

    public function listar()
    {
        try {
            $manager = new  TransactionManager(true);
            $dao = $manager->getDAO('ClienteDAO');
        } finally {
            if (isset($manager)) {
                $manager->close();
            }
        }

        return $dao->listar();
    }
}
