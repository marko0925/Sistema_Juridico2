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

    /**
     * @param ExpedienteDTO $dto
     * @return mixed
     */
    public function registrar($dto){
        $sql="INSERT INTO _expediente(_id_expediente, _fecha, _url, _descripcion, _tipo) VALUES (nextvalue('_expediente__id_expediente_seq'), ?, ?, ?, ?)";
        $parametros=array($dto->getFecha(),$dto->getUrl(),$dto->getDescripcion(),$dto->getTipo());
        if($this->con->save($sql,$parametros)){
            $dto->setIdExpediente($this->con->lastInsertId('_expediente__id_expediente_seq'));
        }
        return $dto;
    }
    public function listar($idProceso){
        $sql='SELECT _id_expediente, _fecha, _url, _descripcion, _tipo FROM _expediente WHERE _proceso=?';
        $parametros=array($idProceso);
        $resultSet=$this->con->findBy($sql,$parametros);
        $listado=  array();
        foreach ($resultSet as $row){
            $dto= new ExpedienteDTO();
            $dto->setIdExpediente($row['_id_expediente']);
            $dto->setFecha($row['_fecha']);
            $dto->setUrl($row['_url']);
            $dto->setDescripcion($row['_descripcion']);
            $dto->setTipo($row['_tipo']);
            $listado[]=$dto;
        }
        return $listado;
    }


}
