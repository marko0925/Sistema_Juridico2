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
        $sql="INSERT INTO _caso(_id_caso, _tipo, _fecha_ini, _fecha_fin, _nombre_juez, _dni, _descripcion, _radicado, _estado) VALUES (nextval('_caso__id_caso_seq'), ?, ?, ?, ?, ?, ?, ?, ?);";
        $parametros=array($dto->getTipoCaso(),$dto->getFechaInicio(),$dto->getFechaFin(),$dto->getJuez(),$dto->getCliente()->getDni(),$dto->getDescripcion(),$dto->getRadicado(),$dto->isEstado());
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
        $sql='SELECT _id_caso, _tipo, _fecha_ini, _fecha_fin, _nombre_juez, _dni, _descripcion, _radicado, _estado FROM _caso WHERE _id_caso= ?';
        $parametros =array($idProceso);
        $result=$this->con->findByOne($sql,$parametros);
        $dto=null;
        if($result!==null){

            $dto= $this->getProcesoDTO($result['_id_caso'],$result['_tipo'],$result['_fecha_ini'],$result['_fecha_fin'],$result['_nombre_juez'],$result['_descripcion'],$result['_radicado'],$result['_estado']);

        }
        return $dto;
    }

    /**
     *
     */
    public function listar(){
        $sql='SELECT _id_caso, _tipo, _fecha_ini, _fecha_fin, _nombre_juez, _dni, _descripcion, _radicado, _estado FROM _caso';
        $result=$this->con->findAll($sql);
        $listado=[];
        if($result!=null){
            //print_r($result);
            foreach ($result as $row){
               $listado[]= $this->getProcesoDTO($row['_id_caso'],$row['_tipo'],$row['_fecha_ini'],$row['_fecha_fin'],$row['_nombre_juez'],$row['_descripcion'],$row['_radicado'],$row['_estado']);
            }
        }
        return $listado;

    }

    private function getProcesoDTO($idCaso,$tipo,$fechaIni,$fechaFin,$juez,$descripcion,$radicado,$estado){
        $dto=new ProcesoDTO();
        $dto->setIdCaso($idCaso);
        $dto->setTipoCaso($tipo);
        $dto->setFechaInicio($fechaIni);
        $dto->setFechaFin($fechaFin);
        $dto->setJuez($juez);
        $dto->setDescripcion($descripcion);
        $dto->setRadicado($radicado);
        $dto->setEstado($estado);
        return $dto;

    }

}
