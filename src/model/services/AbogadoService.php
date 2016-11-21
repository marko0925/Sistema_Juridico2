<?php
require_once __DIR__ . '/../factory/TransactionManager.php';
require_once __DIR__ . '/../dao/AbogadoDAO.php';

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
            $transaccion = new TransactionManager(true);
            $transaccion->beginTransaction();

            $abogadoDAO = $transaccion->getDAO("AbogadoDAO");
            $abogadoDAO->registrar();
        } catch (Exception $e) {
            if (isset($transaccion)) {
                $transaccion->rollback();
            }
        }
    }

    public function listarAbogados()
    {
        try {
            return [ "abogados"=>["dni"=>"88554434","nombre" => "Javier", "apellido" => "Rodriguez", "correo" => "javier@gmail.com", "fecha_nac" => "15/08/91", "telefono" => 5762777,
                "especialidad" => "Casos Familiares", "almamater" => "UFPS"],
                ["dni"=>"09423423","nombre" => "Carlos", "apellido" => "Fernandez", "correo" => "carlos@gmail.com", "fecha_nac" => "12/02/76", "telefono" => 5872133,
                "especialidad" => "Casos Militares", "almamater" => "UDES"]];
            // $transaccion = new TransactionManager(true);
            // $transaccion->beginTransaction();

            //$abogadoDAO = $transaccion->getDAO("AbogadoDAO");
            //$abogadoDAO->listar();
        } catch (Exception $e) {

        }
    }
}