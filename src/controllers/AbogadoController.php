<?php
require_once __DIR__ . '/../../library/core/BaseController.php';
require_once __DIR__ . '/../model/dto/AbogadoDTO.php';
require_once __DIR__ . '/../model/services/AbogadoService.php';

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
     *estos deberia llamarse "getFormularioRegistro" por que hay no se registra nada ¬¬
     */
    public function getFormularioRegistrarAbogado()
    {
        $abogado = new AbogadoService();
        $listado = $abogado->listarEspecialidades();
        $this->setView("abogado/registrarAbogado", array("listado" => $listado));
    }

    /**
     *
     */
    public function getFormularioListarAbogados()
    {
        $this->setView("abogado/listarAbogados");
    }

    public function getlistarAbogados()
    {

        $service = new AbogadoService();
        $listadoAbogados = $service->listado();
        $json = json_encode(array("data" => $listadoAbogados));
        echo $json;
        //y eliminar setView();
    }

    /**
     *
     */
    public function postRegistrar()
    {
        $dni = $_POST["dni"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $correo = $_POST["correo"];
        $fecha_nac = $_POST["fechaNac"];
        $telefono = $_POST["telefono"];
        $especialidad = $_POST["especialidades"];
        $almamater = $_POST["almamater"];
        $clave = $_POST["clave"];
        $dto = new AbogadoDTO();

        $dto->setDni($dni);
        $dto->setApellido($nombre);
        $dto->setNombre($apellido);
        $dto->setCorreo($correo);
        $dto->setPassword($clave);
        $dto->setFecha_nac($fecha_nac);
        $dto->setTelefono($telefono);
        $dto->setAlmamater($almamater);

        //especialidades abogado
        $especialidad = json_decode($especialidad);
        $dtosEsp = [];

        foreach ($especialidad as $esp) {
            $espe = new EspecialidadDTO();
            $espe->setNombre($esp[0]);
            $espe->setFecha($esp[1]);
            $espe->setInstitucion($esp[2]);
            $espe->setDescripcion($esp[3]);
            $dtosEsp[] = $espe;
        }

        $dto->setEspecialidad($dtosEsp);
        $serviceAbogado = new AbogadoService();
        $serviceAbogado->registrar($dto);
    }

    public function postEliminarAbogado()
    {
        $dni = $_GET["dni"];
        $service = new AbogadoService();
        $service->eliminar($dni);
    }

    public function postActualizar()
    {
        $dni = $_POST["dni"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $correo = $_POST["correo"];
        $fecha_nac = $_POST["fechaNac"];
        $telefono = $_POST["telefono"];
        $especialidad = $_POST["especialidades"];
        $almamater = $_POST["almamater"];
        $clave = $_POST["clave"];

        $dto = new AbogadoDTO();
        $dto->setDni($dni);
        $dto->setApellido($nombre);
        $dto->setNombre($apellido);
        $dto->setCorreo($correo);
        $dto->setClave($clave);
        $dto->setFecha_nac($fecha_nac);
        $dto->setTelefono($telefono);
        $dto->setAlmamater($almamater);
        $serviceAbogado = new AbogadoService();
        $serviceAbogado->actualizar($dto);
    }

    // parametro url?nitAbogado=5
    // falta mostrar el array
    public function getListarEspecialiciones()
    {
        $nit = $_GET['nitAbogado'];
        $service = new AbogadoService();
        // array<EspecialidadDTO> de un abogado en especifico
        $service->listarEspecializaciones($nit);

    }
}

