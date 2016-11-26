<?php
require_once __DIR__.'/../dto/CitaDTO.php';
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 22/11/2016
 * Time: 6:14 PM
 */
class ProcesoDAO
{
    /**
     * @var Connection
     */
    private $con;

    public  function __construct($con){
        $this->con=$con;
    }

    /**
     * Metodo- guarda en la base de datos la informacion de un proceso
     * @param ProcesoDTO $dto
     * @return ProcesoDTO
     */
    public function registrar($dto){
        $sql="INSERT INTO _caso(_id_caso,_tipo,_fecha_ini,_fecha_fin,_nombre_juez,_dni)values(nextval('_caso__id_caso_seq'),?,?,?,?,?)";
        $parametros=array($dto->getTipoCaso(),$dto->getFechaInicio(),$dto->getFechaFin(),$dto->getJuez(),$dto->getCliente()->getDni());
        if($this->con->save($sql,$parametros)){
            $dto->setIdCaso($this->con->lastInsertId('_caso__id_caso_seq'));
        }
        return $dto;
    }
    /**
     * @param $idProceso
     * @param $extra   especifica si quiere obtener los datos (AbogadoCaso,Citas,avances)
     * @return null|ProcesoDTO
     */
    public function buscar($idProceso){
        $sql='SELECT * FROM _caso WHERE _id_caso= ?';
        $parametros =array($idProceso);
        $result=$this->con->findByOne($sql,$parametros);
        $dto=null;
        if($result!==null){
            $dto= new ProcesoDTO();
            $dto->setIdCaso($result['_id_caso']);
            $dto->setTipoCaso($result['_tipo']);
            $dto->setFechaInicio($result['_fecha_ini']);
            $dto->setFechaFin($result['_fecha_fin']);
            $dto->setJuez($result['_nombre_juez']);
        }
        return $dto;
    }

}