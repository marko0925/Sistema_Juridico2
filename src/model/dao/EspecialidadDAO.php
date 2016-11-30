<?php
require_once __DIR__.'/../dto/EspecialidadDTO.php';
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 16/11/2016
 * Time: 9:14 PM
 */
class EspecialidadDAO
{
    /**
     * @var Connection
     */
    private $con;

    public  function __construct($con){
        $this->con=$con;
    }

    /**
     * @param int $nitAbogado
     * @return array EspecialidadDTO
     */
    public function findBy($nitAbogado){
        $sql='SELECT e._nombre,e._descripcion,ae._fecha,ae._instituto FROM _abog_espec ae INNER JOIN _abogado a ON a._dni_abogado=ae._dni INNER JOIN _especialidad e ON ae._nombre= e._nombre WHERE a._dni_abogado= ?';
        //dejar espacio para evitar  "ae._dniINNERJOIN"

        $parametros=array($nitAbogado);

        $listado=array();
        $result=$this->con->findBy($sql,$parametros);
        foreach ($result as $row){
            $dtoAbogadoEspecialidad=new AbogadoEspecialidadDTO();
            $dtoAbogadoEspecialidad->setInstituto($row['_instituto']);
            $dtoAbogadoEspecialidad->setFecha($row['_fecha']);
            /**
             * @var EspecialidadDTO
             */
            $dto= new EspecialidadDTO();
            $dto->setNombre($row['_nombre']);
            $dto->setDescripcion($row['_descripcion']);

            $dtoAbogadoEspecialidad->setEspecialidad($dto);
            $listado[]=$dtoAbogadoEspecialidad;
        }
        return $listado;
    }

    /**
     * Metodo- registra un array de especialidades a un abogado identificado por su $nit
     * @param int $nit
     * @param array $listado
     */
    public function registrarListadoEspecialidad($nit,$listado){
        $sql='INSERT INTO _abog_espec(_nombre, _dni, _fecha, _instituto) VALUES (?,?,?,?)';
        /**
         * @var AbogadoEspecialidadDTO $item
         */
        foreach ($listado as $item){
            $parametros=array($item->getEspecialidad()->getNombre(),$nit,$item->getFecha(),$item->getInstituto());
            print_r($parametros);
            $this->con->save($sql,$parametros);
        }
    }

    public function listarEspecialidades(){
        $sql='SELECT _nombre, _descripcion FROM _especialidad';
        $result=$this->con->findAll($sql);
        $listado=[];
        if(!is_null($result)){
            foreach ($result as $row){
                $dto= new EspecialidadDTO();
                $dto->setNombre($row['_nombre'],$row['_descripcion']);
                $listado[]=$dto;
            }
        }
        return $listado;
    }



    /**
     * Metodo- elimina toda las especialidades de un abogado
     * @param int $nit
     * @return bool
     */
   public function eliminarEspecialidad($nit){
       $sql='DELETE FROM _abog_espec WHERE _dni= ?';
       return $this->con->save($sql,array($nit));
   }

}
