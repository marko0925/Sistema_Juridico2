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


    public function getRegistrarCliente(){
        $this->setView("cliente/registrarCliente");
    }
    // sirve
    public function getListarClientes(){
        servicio = new ClienteService();
        $listadoDTO=$servicio->listar();
        $this->setView("cliente/listarClientes",array('listadoDTO'=>$listadoDTO));
    }
    //sirve
    public function postRegistrar()
    {
        require_once __DIR__.'/../model/dto/ClienteDTO.php';
         // @type UsuarioDTO
         $dto= new ClienteDTO();
         $dto->setDni(7);
         $dto->setApellido('coronel correa');
         $dto->setNombre('marlon yesid');
         $dto->setCorreo('marlonyasid09@gmail.com');
         $dto->setFecha_nac('2-4-2011');
         $dto->setTelefono('123456');
         
         $servicio= new ClienteService();
         $servicio->registrar($dto);
    }

    public function getPruebaConexion()
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
