<?php

/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 16/11/2016
 * Time: 8:57 PM
 */
class EspecialidadDTO implements JsonSerializable
{
    private $nombre;
    private $descripcion;
    private $fecha;
    private $institucion;

    /**
     * EspecialidadDTO constructor.
     * @param $nombre
     * @param $descripcion
     */
    public function __construct($nombre=null, $descripcion=null)
    {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getInstitucion()
    {
        return $this->institucion;
    }

    /**
     * @param mixed $institucion
     */
    public function setInstitucion($institucion)
    {
        $this->institucion = $institucion;
    }


    public function jsonSerialize() {
        return [
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion(),
            'institucion'=>$this->getInstitucion(),
            'fecha'=>$this->getInstitucion()
        ];
    }



}
