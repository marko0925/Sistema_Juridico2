<?php
require_once __DIR__.'/../dto/ClienteDTO.php';
class ClienteDAO{
    private $con;
    
    public  function __construct($con){
        $this->con=$con;
    }

    /**
     * Obtiene un array de objetos de tipo ClienteDTO
     * @return array
     */
    public function listar(){
        $sql='SELECT p._dni,p._nombre,p._apellido,p._correo,p._fecha_nac,p._telefono FROM  _cliente c INNER JOIN _persona p ON c._dni_cliente=p._dni';
        $resultSet=$this->con->findAll($sql);
        $listado=  array();
        foreach ($resultSet as $row){
           $dto= new ClienteDTO();
           $dto->setDni($row['_dni']);
           $dto->setApellido($row['_apellido']);
           $dto->setNombre($row['_nombre']);
           $dto->setCorreo($row['_correo']);
           $dto->setFecha_nac($row['_fecha_nac']);
           $dto->setTelefono($row['_telefono']);
           $listado[]=$dto;
        }
        return $listado;
    }
}