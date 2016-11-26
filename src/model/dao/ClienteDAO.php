<?php
require_once __DIR__.'/../dto/ClienteDTO.php';
class ClienteDAO{
    /**
     * @var Connection
     */
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

    /**
     * Metodo- registra en la base de datos un cliente
     * @param ClienteDTO $dto
     * @return boolean
     */
    public function registrar($dto){
        $estado=false;
        $sql='INSERT INTO _persona(_dni,_apellido,_nombre,_fecha_nac,_telefono,_correo) VALUES (?,?,?,?,?,?)';
        $parametros=array($dto->getDni(),$dto->getApellido(),$dto->getNombre(),$dto->getFecha_nac(), $dto->getTelefono(),$dto->getCorreo());
        if($this->con->save($sql,$parametros)){
            $sql='INSERT INTO _cliente(_dni_cliente)VALUES(:dni)';
            $parametros=array(':dni'=>$dto->getDni());
            $estado=$this->con->save($sql,$parametros);
        }
        return $estado;
    }

    /**
     * Metodo- modifica los datos de un cliente en la base de datos
     * @param ClienteDTO $dto
     * @return boolean
     */
    public function actualizar($dto){
        $sql='UPDATE _persona SET _apellido= ?,_nombre= ?,_fecha_nac= ?,_telefono= ?,_correo= ? WHERE _dni= ?';
        $parametros=array($dto->getApellido(),$dto->getNombre(),$dto->getFecha_nac(), $dto->getTelefono(),$dto->getCorreo(),$dto->getDni());
        $estado=$this->con->save($sql,$parametros);
        return $estado;

    }
}
