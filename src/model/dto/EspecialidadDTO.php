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
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }


    public function jsonSerialize()
    {
        return [
            'nombre' => $this->getNombre(),
            'descripcion' => $this->getDescripcion(),
            'institucion' => $this->getInstitucion(),
            'fecha' => $this->getInstitucion()
        ];
    }


}
