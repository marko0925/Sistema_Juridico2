<?php
require_once __DIR__.'/../dto/AbogadoDTO.php';
/**
 * Created by PhpStorm.
 * User: McBro
 * Date: 16/11/2016
 * Time: 4:55 PM
 */
class AbogadoDAO
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

    /**
     * Metodo- guarda en la base de datos las informacion que llega en el objeto AbogadoDTO $dto
     * @param AbogadoDTO $dto
     * @return bool
     */
    public function registrar($dto){
        $estado=false;
        $sql='INSERT INTO _persona(_dni,_apellido,_nombre,_fecha_nac,_telefono,_correo) VALUES (?,?,?,?,?,?)';
        $parametros=array($dto->getDni(),$dto->getApellido(),$dto->getNombre(),$dto->getFecha_nac(), $dto->getTelefono(),$dto->getCorreo());
        if($this->con->save($sql,$parametros)){
            $sql='INSERT INTO _abogado(_dni_abogado,_almamater)VALUES(?,?)';
            $parametros=array($dto->getDni(),$dto->getAlmamater());
            $estado=$this->con->save($sql,$parametros);
        }
        return $estado;
    }

    /**
     * Metodo- actualiza los datos del abogado en la base de datos
     * @param AbogadoDTO $dto
     * @return boolean
     */
    public function actualizar($dto){
        $estado=false;
        $sql='UPDATE _persona SET _apellido= ?,_nombre= ?,_fecha_nac= ?,_telefono= ?,_correo= ? WHERE _dni= ?';
        $parametros=array($dto->getApellido(),$dto->getNombre(),$dto->getFecha_nac(), $dto->getTelefono(),$dto->getCorreo(),$dto->getDni());
        if($this->con->save($sql,$parametros)){
            $sql='UPDATE _abogado SET _almamater= ? WHERE _dni_abogado= ?;';
            $parametros=array($dto->getAlmamater(),$dto->getDni());
            $estado=$this->con->save($sql,$parametros);
        }
        return $estado;

    }

    /**
     * Metodo- consulta en la base de datos todos los abogados registrados
     * @return array
     */
    public function listar(){
        require_once __DIR__.'/EspecialidadDAO.php';
        $sql='SELECT p._dni,p._nombre,p._apellido,p._correo,p._fecha_nac,p._telefono,a._almamater FROM  _abogado a INNER JOIN _persona p ON a._dni_abogado=p._dni';
        $resultSet=$this->con->findAll($sql);
        $listado=  array();
        $daoEspecialidad= new EspecialidadDAO($this->con);
        foreach ($resultSet as $row){
            $dto=$this->getAbogadoDTO($row['_dni'],$row['_apellido'],$row['_nombre'],$row[0]['_correo'],$row['_fecha_nac'],$row['_telefono'],$row['_almamater'],$daoEspecialidad);
            $listado[]=$dto;
        }
        return $listado;
    }
    private function especialidad($daoEspecialidad,$dto){
      $dtoEspecialidad=$daoEspecialidad->findBy($dto->getDni());
      $dto->setEspecialidad($dtoEspecialidad);
    }

    private function getAbogadoDTO($dni,$nombre,$apellido,$correo,$fechaN,$telefono,$almamater,$dao){
        $dto= new AbogadoDTO();
        $dto->setDni($dni);
        $dto->setApellido($apellido);
        $dto->setNombre($nombre);
        $dto->setCorreo($correo);
        $dto->setFecha_nac($fechaN);
        $dto->setTelefono($telefono);
        $dto->setAlmamater($almamater);
        $dto->setEspecialidad($this->especialidad($dao,$dto));
        return $dto;
    }
    public function buscar($idAbogado){
        $sql='SELECT p._dni,p._nombre,p._apellido,p._correo,p._fecha_nac,p._telefono,a._almamater FROM  _abogado a INNER JOIN _persona p ON a._dni_abogado=p._dni WHERE p._dni= ? ';
        $parametros=array($idAbogado);
        $result=$this->con->findByOne($sql,$parametros);
        $dto=null;
        if($result!==null){
            require_once __DIR__.'/EspecialidadDAO.php';
            $dao= new EspecialidadDAO($this->con);
            $dto= $this->getAbogadoDTO($result['_dni'],$result['_apellido'],$result['_nombre'],$result['_correo'],$result['_fecha_nac'],$result['_telefono'],$result['_almamater'],$dao);
        }
        return $dto;
    }


}
