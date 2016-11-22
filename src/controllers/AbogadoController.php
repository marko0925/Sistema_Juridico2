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
    public function getRegistrarAbogado()
    {
        $this->setView("abogado/registrarAbogado");
    }

    /**
     *
     */
    public function getlistarAbogados()
    {
        $service = new AbogadoService();
        // retona un listadoAbogado<AbogadoDTO> forma de rrecorrer el array
        // foreach($listadoAbogado as $itemArray){
        //  $itemArray->metodoGet(); 
        //}
        $listadoAbogados = $service->listado();
        //forma json 

        $json = json_encode($listadoAbogados);
        echo $json;
        //y eliminar setView();

        $this->setView("abogado/listarAbogados", $listadoAbogados);
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

        $dto = new AbogadoDTO();

        $dto->setDni(5);
        $dto->setApellido('jghf kljff');
        $dto->setNombre('kjjfnf klfjjf');
        $dto->setCorreo('nmvnnm@gmail.com');
        $dto->setFecha_nac('1-3-2018');
        $dto->setTelefono('009032');
        $dto->setAlmamater('udes');
        //especialidades abogado
        $dtoEspecialidad1 = new EspecialidadDTO();
        $dtoEspecialidad1->setNombre('matrimonio');
        $dtoEspecialidad2 = new EspecialidadDTO();
        $dtoEspecialidad2->setNombre('familiar');
        //agrego las especialidades en un array al atributo especialidad de abogadoDTO
        $dto->setEspecialidad(array($dtoEspecialidad1, $dtoEspecialidad2));
        // servicio contiene la logica de negocio
        $serviceAbogado = new AbogadoService();
        $serviceAbogado->registrar($dto);

    }

    // en proceso de prueba creo que no sirve
    public function getActualizar()
    {
        $dto = new AbogadoDTO();
        $dto->setDni(4);
        $dto->setApellido('jghf kljff');
        $dto->setNombre('kjjfnf klfjjf');
        $dto->setCorreo('nmvnnm@gmail.com');
        $dto->setFecha_nac('1-3-2018');
        $dto->setTelefono('009032');
        $dto->setAlmamater('upt');
        /**
         * @var EspecialidadDTO
         */
        $dtoEspecialidad1 = new EspecialidadDTO();
        $dtoEspecialidad1->setNombre('matrimonio');
        //s$dtoEspecialidad2 = new EspecialidadDTO();
        //$dtoEspecialidad2->setNombre('familiar');
        $dto->setEspecialidad(array($dtoEspecialidad1));
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
