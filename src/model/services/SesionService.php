<?php

/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 28/11/2016
 * Time: 11:00 AM
 */
class  SesionService
{
    public static function inicioSesion($dni, $password)
    {
        require_once __DIR__ . '/../factory/TransactionManager.php';
        $estado = array('estado' => false, 'mensaje' => '');
        try {
            $manager = new TransactionManager(true);
            $dao = $manager->getDAO('PersonaDAO');
            /**
             * @var PersonaDTO $dto
             */
            $dto = $dao->buscar($dni);
            if ($dto != null) {
                // datos correctos
                if ($dto->getPassword() == md5($password) && $dto->getDni() == $dni) {
                    session_start('login');
                    //verificamos que la session no exista
                    if (!isset($_SESSION['cuenta'])) {
                        $cuenta = array('rol' => $dto->getTipo(), 'nombre' => $dto->getNombre(), 'apellido' => $dto->getApellido(), 'dni' => $dto->getDni());
                        $_SESSION['cuenta'] = $cuenta;
                    } else {
                        $estado['mensaje'] = 'password o cuenta inconrrecta';
                    }
                } else {
                    $estado['mensaje'] = 'password o cuenta inconrrecta';
                }
            }
        } catch (Exception $e) {
            //destruyo las session
            if (session_status() ==PHP_SESSION_ACTIVE) {
                session_destroy();
            }

            echo $e->getMessage();
        } finally {
            if (isset($manager)) {
                $manager->close();
            }
        }
        return $estado;

    }

    public static function verificarRol(){
        session_start('login');
        switch (isset($_SESSION['cuenta'])){
            case true:
                $estado=$_SESSION['cuenta']['rol'];
                break;
            default:
                $estado='inactivo';

        }
        return $estado;

    }

    public  static function cerrar(){
        return session_destroy();
    }

}