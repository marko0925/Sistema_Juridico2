<?php

/**
 * Created by PhpStorm.
 * User: McBro
 * Date: 16/11/2016
 * Time: 4:40 PM
 */
class AbogadoDTO extends PersonaDTO
{
    private $especialidad;
    private $almamater;

    /**
     * AbogadoDTO constructor.
     */
    public function __construct($dni, $nombre, $apellido, $correo, $fecha_nac, $telefono, $especialidad, $almamater)
    {
        parent::PersonaDTO($dni,$nombre,$apellido,$correo,$fecha_nac,$telefono);
        $this->especialidad = $especialidad;
        $this->almamater = $almamater;
    }

    /**
     * @return mixed
     */
    public function getAlmamater()
    {
        return $this->almamater;
    }

    /**
     * @param mixed $almamater
     */
    public function setAlmamater($almamater)
    {
        $this->almamater = $almamater;
    }

    /**
     * @return mixed
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * @param mixed $especialidad
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;
    }

}