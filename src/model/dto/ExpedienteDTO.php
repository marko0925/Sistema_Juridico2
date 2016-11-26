<?php

/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 22/11/2016
 * Time: 6:09 PM
 */
class ExpedienteDTO
{
    /**
     * @var int
     */
    private $idExpediente;
    /**
     * @var string
     */
    private $tipoDocumento;
    /**
     * @var string
     */
    private $fecha;
    /**
     * @var string
     */
    private $url;
    /**
     * @var string
     */
    private $descripcion;

    /**
     * @return int
     */
    public function getIdExpediente()
    {
        return $this->idExpediente;
    }

    /**
     * @param int $idExpediente
     */
    public function setIdExpediente($idExpediente)
    {
        $this->idExpediente = $idExpediente;
    }

    /**
     * @return string
     */
    public function getTipoDocumento()
    {
        return $this->tipoDocumento;
    }

    /**
     * @param string $tipoDocumento
     */
    public function setTipoDocumento($tipoDocumento)
    {
        $this->tipoDocumento = $tipoDocumento;
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
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
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



}