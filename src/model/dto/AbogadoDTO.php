<?php
require_once __DIR__.'/../dto/AbogadoEspecialidadDTO.php';
require_once __DIR__.'/../dto/PersonaDTO.php';
/**
 * Created by PhpStorm.
 * User: McBro
 * Date: 16/11/2016
 * Time: 4:40 PM
 */
class AbogadoDTO extends PersonaDTO implements JsonSerializable
{
    /**
     * @var AbogadoEspecialidadDTO
     */
    private $abogadoEspecialidad;
    /**
     * @var string
     */
    private $almamater;

    /**
     * AbogadoDTO constructor.
     * @param $especialidad
     * @param $almamater
     */
    public function __construct($especialidad=null, $almamater=null)
    {
        parent::__construct();
        $this->especialidad = $especialidad;
        $this->almamater = $almamater;
    }

    /**
     * @return AbogadoEspecialidadDTO
     */
    public function getAbogadoEspecialidad()
    {
        return $this->abogadoEspecialidad;
    }

    /**
     * @param AbogadoEspecialidadDTO $abogadoEspecialidad
     */
    public function setAbogadoEspecialidad($abogadoEspecialidad)
    {
        $this->abogadoEspecialidad = $abogadoEspecialidad;
    }

    /**
     * @return string
     */
    public function getAlmamater()
    {
        return $this->almamater;
    }

    /**
     * @param string $almamater
     */
    public function setAlmamater($almamater)
    {
        $this->almamater = $almamater;
    }


    /**
     * Metodo- sirve para convetir un objeto con atributos privados en una cadena con formato json usando el metodo json_encode
     * @return array
     */
    public function jsonSerialize() {
        return [
            'dni' => $this->getDni(),
            'apellido' => $this->getApellido(),
            'nombre' => $this->getNombre(),
            'fechaNacimiento' => $this->getFecha_nac(),
            'telefono' => $this->getTelefono(),
            'email' => $this->getCorreo(),
            'almamater'=>$this->getAlmamater(),
            'especialidad'=>$this->getAbogadoEspecialidad()
        ];
    }

}
