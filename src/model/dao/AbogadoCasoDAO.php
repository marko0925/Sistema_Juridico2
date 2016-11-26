<?php
require_once __DIR__.'/../dto/AbogadoCasoDTO.php';
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 23/11/2016
 * Time: 5:48 PM
 */
class AbogadoCasoDAO
{
    /**
     * @var Connection
     */
    private $con;

    public  function __construct($con){
        $this->con=$con;
    }

    /**
     * @param $idAbogado
     * @param $idProceso
     * @return AbogadoCasoDTO|null
     */
    public function buscar($idAbogado,$idProceso){
        require_once __DIR__.'/AbogadoDAO.php';
        require_once __DIR__.'/ProcesoDAO.php';
        $sql='SELECT _id,_dni FROM _abogado_caso where _id = ? and _dni= ?';
        $parametros =array($idProceso,$idAbogado);
        $dto=null;
        $result=$this->con->findBy($sql,$parametros);
        if($result!==null){
            $dto = new AbogadoCasoDTO();
            $daoAbogado= new AbogadoDAO($this->con);
            $dto->setAbogado($daoAbogado->buscar($result[0]['_dni']));
            $daoProceso= new ProcesoDAO($this->con);
            $dto->setProceso($daoProceso->buscar($result[0]['_id']));
        }
        return $dto;

    }

}