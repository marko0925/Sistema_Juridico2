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
     * @return null
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param null $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return null
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param null $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function jsonSerialize() {
        return [
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion()
        ];
    }



}
