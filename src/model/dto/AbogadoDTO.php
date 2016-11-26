<?php
require_once __DIR__.'/../dto/EspecialidadDTO.php';
require_once __DIR__.'/../dto/PersonaDTO.php';
/**
 * Created by PhpStorm.
 * User: McBro
 * Date: 16/11/2016
 * Time: 4:40 PM
 */
class AbogadoDTO extends PersonaDTO implements JsonSerializable
{
    private $especialidad;
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
     * @return array
     */
    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    /**
     * @param array $especialidad
     */
    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;
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

    public function agregarEspecialidad($espec){
        $this->especialidad[] = $espec;
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
            'especialidad'=>$this->getEspecialidad()
        ];
    }

}
