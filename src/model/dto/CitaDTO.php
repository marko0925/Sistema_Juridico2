<?php
require_once __DIR__.'/AbogadoCasoDTO.php';
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 21/11/2016
 * Time: 9:58 PM
 */
class CitaDTO implements JsonSerializable
{
    /**
     * @var int
     */
    private $idCita;
    /**
     * @var string
     */
    private $asunto;
    /**
     * @var date
     */
    private $fecha;

    /**
     * @var AbogadoCasoDTO
     */
    private $abogadoCaso;
    /**
     * @return int
     */
    public function getIdCita()
    {
        return $this->idCita;
    }

    /**
     * @param int $idCita
     */
    public function setIdCita($idCita)
    {
        $this->idCita = $idCita;
    }

    /**
     * @return string
     */
    public function getAsunto()
    {
        return $this->asunto;
    }

    /**
     * @param string $asunto
     */
    public function setAsunto($asunto)
    {
        $this->asunto = $asunto;
    }

    /**
     * @return date
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param date $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * Metodo- sirve para convetir un objeto con atributos privados en una cadena con formato json usando el metodo json_encode
     * @return array
     */
    public function jsonSerialize() {
        return [
            'idCita' => $this->getIdCita(),
            'asunto' => $this->getAsunto(),
            'fecha' => $this->getFecha(),
            'abogadoCaso' => $this->getAbogadoCaso()
        ];
    }


    /**
     * @return AbogadoCasoDTO
     */
    public function getAbogadoCaso()
    {
        return $this->abogadoCaso;
    }

    /**
     * @param AbogadoCasoDTO $abogadoCaso
     */
    public function setAbogadoCaso($abogadoCaso)
    {
        $this->abogadoCaso = $abogadoCaso;
    }




}