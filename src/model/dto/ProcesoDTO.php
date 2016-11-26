<?php

/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 22/11/2016
 * Time: 5:39 PM
 */
class ProcesoDTO implements JsonSerializable
{
    /**
     * @var int
     */
    private $idCaso;
    /**
     * @var string
     */
    private $tipoCaso;
    /**
     * @var string
     */
    private $fechaInicio;
    /**
     * @var string
     */
    private $fechaFin;
    /**
     * @var string
     */
    private $juez;
    /**
     * @var array <CitaDTO>
     */
    private $citas;
    /**
     * @var ClienteDTO
     */
    private $cliente;
    /**
     * @var  array <AbogadoCasoDTO>
     */
    private $abogados;

    /**
     * @return int
     */
    public function getIdCaso()
    {
        return $this->idCaso;
    }

    /**
     * @param int $idCaso
     */
    public function setIdCaso($idCaso)
    {
        $this->idCaso = $idCaso;
    }

    /**
     * @return string
     */
    public function getTipoCaso()
    {
        return $this->tipoCaso;
    }

    /**
     * @param string $tipoCaso
     */
    public function setTipoCaso($tipoCaso)
    {
        $this->tipoCaso = $tipoCaso;
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
     * @return string
     */
    public function getJuez()
    {
        return $this->juez;
    }

    /**
     * @param string $juez
     */
    public function setJuez($juez)
    {
        $this->juez = $juez;
    }

    /**
     * @return array
     */
    public function getCitas()
    {
        return $this->citas;
    }

    /**
     * @param array $citas
     */
    public function setCitas($citas)
    {
        $this->citas = $citas;
    }

    /**
     * @return ClienteDTO
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param ClienteDTO $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return array
     */
    public function getAbogados()
    {
        return $this->abogados;
    }

    /**
     * @param array $abogados
     */
    public function setAbogados($abogados)
    {
        $this->abogados = $abogados;
    }

    public function jsonSerialize() {
        return [
            'idCaso' => $this->getIdCaso(),
            'tipoCaso' => $this->getTipoCaso(),
            'fechaInicio' => $this->getFechaInicio(),
            'fechaFin' => $this->getFechaFin(),
            'juez'=>$this->getJuez(),
            'juez'=>$this->getJuez(),
            'clientes'=>$this->getCliente()
        ];
    }




}