<?php
require_once __DIR__.'/../dto/PersonaDTO.php';
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 28/11/2016
 * Time: 10:32 AM
 */
class PersonaDAO
{
    /**
     * @var Connection
     */
    private $con;


    /**
     * AbogadoDAO constructor.
     */
    public function __construct($con)
    {
        $this->con=$con;
    }

    public function buscar($dni){
        $sql='SELECT _dni, _nombre, _apellido, _correo, _fecha_nac, _telefono, _password, _tipo FROM _persona  WHERE _dni= ?';
        $parametros=array($dni);
        $row=$this->con->findByOne($sql,$parametros);
        $dto=null;
        if($row ==null){
            $dto= $this->getPersonaDTO($row['_dni'],row['_apellido'],$row['_nombre'],$row['_correo'],$row['_fecha_nac'],$row['_telefono'],$row['_password'],$row['tipo']);
        }
        return $dto;
    }

    private function getPersonaDTO($dni,$apellido,$nombre,$correo,$fechaN,$telefono,$password,$tipo){
        $dto= new PersonaDTO();
        $dto->setDni($dni);
        $dto->setApellido($apellido);
        $dto->setNombre($nombre);
        $dto->setCorreo($correo);
        $dto->setFecha_nac($fechaN);
        $dto->setTelefono($telefono);
        $dto->setPassword($password);
        $dto->setTipo($tipo);
        return $dto;
    }

}