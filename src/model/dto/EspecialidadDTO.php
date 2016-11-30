<?php

/**
 * Created by PhpStorm.
 * User: McBro
 * Date: 29/11/2016
 * Time: 12:26 AM
 */
include_once __DIR__."/ClienteDTO.php";
class ProcesoDTO
{
    private $tipo;
    private $descripcion;
    private $cliente;
    private $rad;
    private $fechaini;
    private $fechafin;
    private $juez;


    /**
     * ProcesoDTO constructor.
     * @param $tipo
     * @param $descripcion
     * @param $cliente
     * @param $rad
     * @param $fechaini
     * @param $fechafin
     * @param $juez
     */


    public function __construct($tipo, $descripcion, $cliente, $rad, $fechaini, $fechafin, $juez)
    {
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
        $this->cliente = $cliente;
        $this->rad = $rad;
        $this->fechaini = $fechaini;
        $this->fechafin = $fechafin;
        $this->juez = $juez;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
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

    /**
     * @return mixed
     */
    public function getFechaini()
    {
        return $this->fechaini;
    }

    /**
     * @param mixed $fechaini
     */
    public function setFechaini($fechaini)
    {
        $this->fechaini = $fechaini;
    }

    /**
     * @return mixed
     */
    public function getJuez()
    {
        return $this->juez;
    }

    /**
     * @param mixed $juez
     */
    public function setJuez($juez)
    {
        $this->juez = $juez;
    }

    /**
     * @return mixed
     */
    public function getRad()
    {
        return $this->rad;
    }

    /**
     * @param mixed $rad
     */
    public function setRad($rad)
    {
        $this->rad = $rad;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return mixed
     */
    public function getFechafin()
    {
        return $this->fechafin;
    }

    /**
     * @param mixed $fechafin
     */
    public function setFechafin($fechafin)
    {
        $this->fechafin = $fechafin;
    }

}
