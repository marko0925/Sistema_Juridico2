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
    private $radicado;
    /**
     * @var string
     */
    private $tipoCaso;
    /**
     * @var string
     */
    private $descripcion;

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
    private $abogadoCaso;

    /**
     * @var boolean
     */
    private $estado;
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
    public function getAbogadoCaso()
    {
        return $this->abogadoCaso;
    }

    /**
     * @param array $abogadoCaso
     */
    public function setAbogadoCaso($abogadoCaso)
    {
        $this->abogadoCaso = $abogadoCaso;
    }

    /**
     * @return string
     */
    public function getRadicado()
    {
        return $this->radicado;
    }

    /**
     * @param string $radicado
     */
    public function setRadicado($radicado)
    {
        $this->radicado = $radicado;
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
     * @return boolean
     */
    public function isEstado()
    {
        return $this->estado;
    }

    /**
     * @param boolean $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }



    public function jsonSerialize() {
        return [
            'idCaso' => $this->getIdCaso(),
            'radicado'=>$this->getRadicado(),
            'tipoCaso' => $this->getTipoCaso(),
            'fechaInicio' => $this->getFechaInicio(),
            'fechaFin' => $this->getFechaFin(),
            'estado'=>$this->isEstado(),
            'juez'=>$this->getJuez(),
            'juez'=>$this->getJuez(),
            'clientes'=>$this->getCliente()
        ];
    }




}
