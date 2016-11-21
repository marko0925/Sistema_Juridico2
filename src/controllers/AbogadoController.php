<?php
require_once __DIR__ . '/../../library/core/BaseController.php';
require_once __DIR__.'/../model/dto/AbogadoDTO.php';
require_once __DIR__.'/../model/services/AbogadoService.php';
/**
 * Created by PhpStorm.
 * User: McBro
 * Date: 16/11/2016
 * Time: 3:46 PM
 */
class AbogadoController extends BaseController
{

    /**
     * AbogadoController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function getRegistrarAbogado(){
        $this->setView("abogado/registrarAbogado");
    }

    /**
     *
     */
    public function getlistarAbogados(){
        $serviceAbogado =  new AbogadoService();
        $listadoAbogados = $serviceAbogado->listarAbogados();
        $this->setView("abogado/listarAbogados",$listadoAbogados);
    }
    /**
     *
     */
    public function postRegistrar()
    {
        $dni = $_POST["txtDniAbogado"];
        $nombre = $_POST["txtNombreAbogado"];
        $apellido = $_POST["txtApellidoAbogado"];
        $correo = $_POST["txtCorreoAbogado"];
        $fecha_nac = $_POST["txtFechaNacimientoAbogado"];
        $telefono = $_POST["txtTelefonoAbogado"];
        $especialidad = $_POST["txtEspecialidadAbogado"];
        $almamater = $_POST["txtAlmamaterAbogado"];

        $abogadoDTO = new AbogadoDTO($dni,$nombre,$apellido,$correo,$fecha_nac,$telefono,$especialidad,$almamater);

        $serviceAbogado = new AbogadoService();
        $serviceAbogado->registrar($abogadoDTO);
    }
}