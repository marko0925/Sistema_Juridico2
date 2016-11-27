<?php
require_once __Dir__ . '/PersonaDTO.php';

/**
 *
 */
class ClienteDTO extends PersonaDTO implements JsonSerializable
{
    public function __construct($dni = null, $nombre = null, $apellido = null, $correo = null, $fecha_nac = null, $telefono = null)
    {
        parent::__construct($dni = null, $nombre = null, $apellido = null, $correo = null, $fecha_nac = null, $telefono = null);

    }

    public function jsonSerialize()
    {
        return [
            'dni' => $this->getDni(),
            'apellido' => $this->getApellido(),
            'nombre' => $this->getNombre(),
            'fechaNac' => $this->getFecha_nac(),
            'telefono' => $this->getTelefono(),
            'correo' => $this->getCorreo()
        ];
    }

}
