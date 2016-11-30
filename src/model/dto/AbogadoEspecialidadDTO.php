<?php
require_once __DIR__.'/AbogadoEspecialidadDTO.php';
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 29/11/2016
 * Time: 7:02 PM
 */
class AbogadoEspecialidadDTO implements JsonSerializable
{
    /**
     * @var EspecialidadDTO
     */
    private $especialidad;
    /**
     * @var string
     */
    private $fecha;
    /**
     * @var string
     */
    private $instituto;

    /**
     * @return EspecialidadDTO
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * @param EspecialidadDTO $especialidad
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;
    }

    /**
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param string $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return string
     */
    public function getInstituto()
    {
        return $this->instituto;
    }

    /**
     * @param string $instituto
     */
    public function setInstituto($instituto)
    {
        $this->instituto = $instituto;
    }

    public function jsonSerialize() {
        return [
            'fecha' => $this->getFecha(),
            'instituto' => $this->getInstituto(),
            'especialidad' => $this->getEspecialidad(),

        ];
    }

}