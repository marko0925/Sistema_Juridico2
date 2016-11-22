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
        $sql='SELECT e._nombre,e._descripcion FROM _abog_espec ae INNER JOIN _abogado a ON a._dni_abogado=ae._dni'.
        //dejar espacio para evitar  "ae._dniINNERJOIN"
        ' INNER JOIN _especialidad e ON ae._nombre= e._nombre WHERE a._dni_abogado= ?';
        $parametros=array($nitAbogado);

        $listado=array();
        $result=$this->con->findBy($sql,$parametros);
        foreach ($result as $row){
            /**
             * @var EspecialidadDTO
             */
            $dto= new EspecialidadDTO();
            $dto->setNombre($row['_nombre']);
            $dto->setDescripcion($row['_descripcion']);
            $listado[]=$dto;
        }
        return $listado;
    }

    /**
     * Metodo- registra un array de especialidades a un abogado identificado por su $nit
     * @param int $nit
     * @param array $listado
     */
    public function registrarListadoEspecialidad($nit,$listado){
        $sql='INSERT INTO _abog_espec(_nombre,_dni) VALUES (?,?)';
        foreach ($listado as $item){
            $this->con->save($sql,array($item->getNombre(),$nit));
        }
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
