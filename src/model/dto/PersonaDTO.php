<?php
  /**
   *
   */
  class PersonaDTO{
    private $dni;
    private $nombre;
    private $apellido;
    private $correo;
    private $fecha_nac;
    private $telefono;
<<<<<<< HEAD
    function __construct($dni=null,$nombre=null, $apellido=null, $correo=null, $fecha_nac=null, $telefono=null){
=======
    function PersonaDTO($dni,$nombre, $apellido, $correo, $fecha_nac, $telefono){
>>>>>>> 47cd0fcb6862f3154cd6c608e7e900861e785faf
      $this->dni = $dni;
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->correo = $correo;
      $this->fecha_nac = $fecha_nac;
      $this->telefono = $telefono;
    }

    function getDni() {
        return $this->dni;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getFecha_nac() {
        return $this->fecha_nac;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setDni($dni) {
        $this->dni = $dni;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setFecha_nac($fecha_nac) {
        $this->fecha_nac = $fecha_nac;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }


  }
