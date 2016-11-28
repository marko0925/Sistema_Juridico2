<?php
require_once __DIR__.'/../dto/ExpedienteDTO.php';
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 26/11/2016
 * Time: 10:21 PM
 */
class ExpedienteDAO
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
    public function registrar($dto){
        $sql="INSERT INTO _observacion(_id_observacion, _nota, _fecha, _nombre, _abogado_caso, _id_caso)VALUES (nextval('_observacion__id_observacion_seq'),?,?,?,?,?)";
        $dtoAbogadoCaso=$dto->getAbogadoCaso();
        $parametros=array($dto->getNota(),$dto->getFecha(),$dto->getNombre(),$dtoAbogadoCaso->getAbogado()->getDni(),$dtoAbogadoCaso->getProceso()->getIdCaso());
        if($this->con->save($sql,$parametros)){
            $dto->setIdObservacion($this->con->lastInsertId('_observacion__id_observacion_seq'));
        }
        return $dto;
    }


}