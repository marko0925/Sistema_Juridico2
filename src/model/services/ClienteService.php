<?php
require_once __DIR__ . '/../factory/TransactionManager.php';

class ClienteService
{
    /**
     * Metodo- registrar un cliente
     * @param ClienteDTO $dto
     */
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

    /**
     * Metodo- actualiza a un cliente
     * @param ClienteDTO $dto
     */
    public function actualizar($dto){
        try {
            //manager transaction
            $manager = new TransactionManager(true);
            /**
             * @var ClienteDAO
             */
            $dao = $manager->getDAO('ClienteDAO');
            $dao->actualizar($dto);
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

    /**
     * Metodo- lista todos los clientes existentes
     * @return mixed
     */
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
