<?php

/**
 *
 */
class PersonaDTO
{
    private $dni;
    private $nombre;
    private $apellido;
    private $correo;
    private $fecha_nac;
    private $telefono;
    private $clave;
    function __construct($dni = null, $nombre = null, $apellido = null, $correo = null, $fecha_nac = null, $telefono = null)
    {

    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
    }


    function getDni()
    {
        return $this->dni;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function getApellido()
    {
        return $this->apellido;
    }

    function getCorreo()
    {
        return $this->correo;
    }

    function getFecha_nac()
    {
        return $this->fecha_nac;
    }

    function getTelefono()
    {
        return $this->telefono;
    }

    function setDni($dni)
    {
        $this->dni = $dni;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    function setFecha_nac($fecha_nac)
    {
        $this->fecha_nac = $fecha_nac;
    }

    function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }


}
