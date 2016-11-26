<?php
require_once __DIR__.'/AbogadoDTO.php';
require_once __DIR__.'/ProcesoDTO.php';
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 22/11/2016
 * Time: 6:01 PM
 */
class AbogadoCasoDTO implements JsonSerializable
{
    /**
     * @var AbogadoDTO
     */
    private $abogado;

    /**
     * @var ProcesoDTO|null
     */
    private $proceso;

    private $fechaInicio;
    /**
     * @var string
     */
    private $fechaFin;

    /**
     * @return AbogadoDTO
     */
    public function getAbogado()
    {
        return $this->abogado;
    }

    /**
     * @param AbogadoDTO $abogado
     */
    public function setAbogado($abogado)
    {
        $this->abogado = $abogado;
    }

    /**
     * @return string
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * @param string $fechaInicio
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }

    /**
     * @return string
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * @param string $fechaFin
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    }

    /**
     * @return null|ProcesoDTO
     */
    public function getProceso()
    {
        return $this->proceso;
    }

    /**
     * @param null|ProcesoDTO $proceso
     */
    public function setProceso($proceso)
    {
        $this->proceso = $proceso;
    }

    public function jsonSerialize() {
        return [
            'fechaInicio' => $this->getFechaInicio(),
            'fechaFin' => $this->getFechaFin(),
            'abogado' => $this->getAbogado(),
            'proceso' => $this->getProceso()
        ];
    }





}