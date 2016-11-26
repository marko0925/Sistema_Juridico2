<?php

/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 22/11/2016
 * Time: 5:52 PM
 */
class ObservacionDTO implements  JsonSerializable
{
    /**
     * @var string
     */
    private $idObservacion;
    /**
     * @var string
     */
    private $nota;
    /**
     * @var string
     */
    private $fecha;
    /**
     * @var string
     */
    private $nombre;
    /**
     * @var AbogadoCasoDTO
     */
    private $abogadoCaso;

    /**
     * @return string
     */
    public function getIdObservacion()
    {
        return $this->idObservacion;
    }

    /**
     * @param string $idObservacion
     */
    public function setIdObservacion($idObservacion)
    {
        $this->idObservacion = $idObservacion;
    }

    /**
     * @return string
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param string $nota
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
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
     * @return AbogadoCasoDTO
     */
    public function getAbogadoCaso()
    {
        return $this->abogadoCaso;
    }

    /**
     * @param AbogadoCasoDTO $abogadoCaso
     */
    public function setAbogadoCaso($abogadoCaso)
    {
        $this->abogadoCaso = $abogadoCaso;
    }
    public function jsonSerialize()
    {
        return [
            'idObservacion' => $this->getIdObservacion(),
            'nota' => $this->getNota(),
            'nombre' => $this->getNombre(),
            'fecha' => $this->getFecha(),
            'abogadoCaso' => $this->getAbogadoCaso()
        ];
    }



}