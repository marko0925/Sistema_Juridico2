<?php
require_once __DIR__ . '/../../library/core/BaseController.php';
require_once __DIR__ . '/../model/services/ClienteService.php';
require_once __DIR__ . '/../model/dto/ClienteDTO.php';

/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 08/07/2016
 * Time: 07:39 PM
 */
class ClienteController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }


    public function getFormularioRegistrarCliente()
    {
        $this->setView("cliente/registrarCliente");
    }

    public function getListadoClientes()
    {
        $this->setView("cliente/listarClientes");
    }

    // sirve
    public function getListarClientes()
    {
        $listado = $this->postListarClientes2();
        $json = json_encode(array("data" => $listado));
        // $json .= '[{"dni" : "0925","nombre" : "Marlon", "apellido" : "Coronel","correo" : "marlon@gmail.com","telefono" : 5762777,"fechaNac" : "06/04/15"}]';
        echo $json;
    }

    public function postListarClientes2()
    {
        $servicio = new ClienteService();
        return $listadoDTO = $servicio->listar();
    }


    //sirve
    public function postRegistrar()
    {

        $dni = $_POST["dni"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $correo = $_POST["correo"];
        $fecha_nac = $_POST["fechaNac"];
        $telefono = $_POST["telefono"];
        $clave = $_POST["clave"];
        // @type UsuarioDTO
        $dto = new ClienteDTO();

        $dto->setDni($dni);
        $dto->setApellido($apellido);
        $dto->setNombre($nombre);
        $dto->setCorreo($correo);
        $dto->setFecha_nac($fecha_nac);
        $dto->setTelefono($telefono);
        $dto->setPassword($clave);
        $servicio = new ClienteService();
        $servicio->registrar($dto);
    }

    public function postActualizar()
    {
        $dni = $_POST["dni"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $correo = $_POST["correo"];
        $fecha_nac = $_POST["fechaNac"];
        $telefono = $_POST["telefono"];
        $clave = $_POST["clave"];
        // @type UsuarioDTO
        $dto = new ClienteDTO();
        $dto->setDni($dni);
        $dto->setApellido($apellido);
        $dto->setNombre($nombre);
        $dto->setCorreo($correo);
        $dto->setFecha_nac($fecha_nac);
        $dto->setTelefono($telefono);
        $dto->setPassword($clave);
        // @type UsuarioDTO
        $servicio = new ClienteService();
        $servicio->actualizar($dto);
    }

    public function postEliminarAbogado()
    {
        $dni = $_GET["dni"];
        $service = new ClienteService();
        $service->eliminar($dni);
    }


    public
    function getPruebaConexion()
    {
        // @type UsuarioDTO
        $dto = new UsuarioDTO();
        $dto->setDni(3);
        $dto->setApellido('oprdoez gayon');
        $dto->setNombre('miguel angel');
        $dto->setCorreo('marlonyasid09@gmail.com');
        $dto->setFecha_nac('2-4-2011');
        $dto->setTelefono('879478947');

        $servicio = new ClienteService();
        $servicio->registrar($dto);
        //@type Connection
//             
    }

}
