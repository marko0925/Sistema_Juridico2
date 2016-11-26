<?php
require_once __DIR__.'/../dto/ObservacionDTO.php';
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 25/11/2016
 * Time: 7:23 AM
 */
class ObservacionDAO
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
     * @param ObservacionDTO $dto
     * @return ObservacionDTO
     */
    public function registrar($dto){
        $sql="INSERT INTO _observacion(_id_observacion, _nota, _fecha, _nombre, _abogado_caso, _id_caso)VALUES (nextval('_observacion__id_observacion_seq'),?,?,?,?,?)";
        $dtoAbogadoCaso=$dto->getAbogadoCaso();
        $parametros=array($dto->getNota(),$dto->getFecha(),$dto->getNombre(),$dtoAbogadoCaso->getAbogado()->getDni(),$dtoAbogadoCaso->getProceso()->getIdCaso());
        if($this->con->save($sql,$parametros)){
           $dto->setIdObservacion($this->con->lastInsertId('_observacion__id_observacion_seq'));
        }
        return $dto;

    }

    public function listar($idAbogado){
        require_once __DIR__.'/AbogadoCasoDAO.php';
        $sql='SELECT _id_observacion, _nota, _fecha, _nombre, _abogado_caso, _id_caso FROM _observacion WHERE _abogado_caso=?;';
        $parametros=array($idAbogado);
        $resultSet=$this->con->findBy($sql,$parametros);
        $listado=  array();
        $daoAbogadoCaso = new AbogadoCasoDAO($this->con);
        foreach ($resultSet as $row){
            $dtoAbogadoCaso=$daoAbogadoCaso->buscar($row['_abogado_caso'],$row['_id_caso']);
            $listado[]=$this->getObservacionDTO($row['_id_observacion'],$row['_nota'],$row['_fecha'],$row['_nombre'],$dtoAbogadoCaso);
        }
        return $listado;
    }
    private function getObservacionDTO($id,$nota,$fecha,$nombre,$abogadoCaso){
        $dto= new ObservacionDTO();
        $dto->setAbogadoCaso($id);
        $dto->setNota($nota);
        $dto->setFecha($fecha);
        $dto->setNombre($nombre);
        $dto->setAbogadoCaso($abogadoCaso);
        return $dto;
    }

}