<?php
class ClienteDAO{
    private $con;
    
    public  function __construct($con){
        $this->con=$con;
    }

    public function listar(){
        $sql='Select * from _cliente';
        $resultSet=$con->findAll($sql);
        $listado=  array();
        foreach ($resultSet as $row){
           $dto= new UsuarioDTO();
           $dto->setDni($resultSet['_dni']);
           $dto->setApellido($resultSet['_nombre']);
           $dto->setNombre($resultSet['_apellido']);
           $dto->setCorreo($resultSet['_correo']);
           $dto->setFecha_nac($resultSet['_fecha_nac']);
           $dto->setTelefono($resultSet['_telefono']);
           $listado[]=$dto;
        }
    }
}