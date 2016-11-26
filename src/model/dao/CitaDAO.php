<?php
require_once __DIR__ . '/../dto/CitaDTO.php';

/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 21/11/2016
 * Time: 10:03 PM
 */
class CitaDAO
{
    /**
     * @var Connection
     */
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    /**
     * Metodo- registrar una cita en la base de datos y devuelve su autoincremento en el atributo idCita del objeto $dtoCita
     * @param CitaDTO $dtoCita
     * @return CitaDTO
     */
    public function registrar($dtoCita)
    {
        $sql = "INSERT INTO _cita(_id_cita,_asunto,_fecha,_abogado_caso,_id_caso)values(nextval('_cita__id_cita_seq'),?,?,?,?)";
        $abogadoProceso = $dtoCita->getAbogadoCaso();
        $parametros = array($dtoCita->getAsunto(), $dtoCita->getFecha(), $abogadoProceso->getAbogado()->getDni(), $abogadoProceso->getProceso()->getIdCaso());
        if ($this->con->save($sql, $parametros)) {
            $dtoCita->setIdCita($this->con->lastInsertId('_cita__id_cita_seq'));
        }
        return $dtoCita;
    }

    /**
     * Metodo- realiza un select de todos las citas registras en la base de datos
     * @return array
     */
    public function listar()
    {
        require_once __DIR__ . '/AbogadoCasoDAO.php';
        $sql = 'SELECT _id_cita, _asunto, _fecha, _id_caso, _abogado_caso FROM _cita';
        $result = $this->con->findAll($sql);
        $listado=array();
        if ($result != null) {
            $daoAbogadoCaso = new AbogadoCasoDAO($this->con);
            foreach ($result as $row) {
                $dtoAbogadoCaso =$daoAbogadoCaso->buscar($row['_abogado_caso'],$row['_id_caso']);
                $listado[]=$this->getCitaDTO($row['_id_cita'],$row['_asunto'],$row['_fecha'],$dtoAbogadoCaso);
            }

        }
        return $listado;

    }

    /**
     * Metodo- genera un objeto de la clase CitaDTO
     * @param int $idCita
     * @param string $asuto
     * @param string $fecha
     * @param AbogadoCasoDTO $abogadoCaso
     * @return CitaDTO
     */
    private function getCitaDTO($idCita,$asuto,$fecha,$abogadoCaso){
        $dto= new CitaDTO();
        $dto->setIdCita($idCita);
        $dto->setAsunto($asuto);
        $dto->setFecha($fecha);
        $dto->setAbogadoCaso($abogadoCaso);
        return $dto;
    }


}