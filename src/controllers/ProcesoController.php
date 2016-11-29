<?php
require_once __DIR__.'/../../library/core/BaseController.php';
require_once __DIR__.'/../model/services/ProcesoService.php';
class ProcesoController extends BaseController
{
    public  function __construct()
    {
        parent::__construct();
    }

    public function getFormularioRegistro(){
        $this->setView('proceso/formularioRegistroProceso');
    }

    public function getListarCitas(){
        require_once __DIR__.'/../model/dto/CitaDTO.php';
        $service= new ProcesoService();
        $json= json_encode($service->listarCitas());
        echo $json;
    }
    public function getRegistrarCita(){
        require_once __DIR__.'/../model/dto/CitaDTO.php';
        $dtoCita= new CitaDTO();
        $dtoCita->setAsunto('reunion importante');
        $dtoCita->setFecha('1-3-2018');
        $service= new ProcesoService();
        $service->registrarCita($dtoCita,4,3);
    }

    public function getListarObservaciones(){
        $service = new ProcesoService();
        //id del abogado al que le pertenecen las observaciones
        $json=json_encode($service->listarObservaciones(4));
        echo $json;

    }
    public function getRegistrarObservacion(){
        require_once __DIR__.'/../model/dto/ObservacionDTO.php';
        $dto = new ObservacionDTO();
        $dto->setNombre('nota prueba');
        $dto->setNota('kjfjhfhjfhfkhfkhfkjfkhfhfbf');
        $dto->setFecha('1-3-2018');
        $service = new ProcesoService();
        $service->registrarObservacion($dto,4,3);
    }
    public function getSubirArchivoExpediente(){
        $service = new ProcesoService();
        $json=json_encode($service->subirArchivoExpediente($_FILES['inputFile']));
        echo $json;
    }
    public function getRegistrarExpedientes(){
        require_once __DIR__.'/../model/dto/ExpedienteDTO.php';

        $dto1= new ExpedienteDTO();
        $dto1->setDescripcion('esta es una descripcion del documento 1');
        $dto1->setTipoDocumento('solicitud juzgado');
        $dto1->setFecha('1-3-2018');
        $dto1->setUrl('localhost1');

        $dto2= new ExpedienteDTO();
        $dto2->setDescripcion('esta es una descripcion del documento 1');
        $dto2->setTipoDocumento('solicitud juzgado');
        $dto2->setFecha('1-3-2018');
        $dto2->setUrl('localhost1');

        $listado=Array($dto1,$dto2);
        $service = new ProcesoService();
        $service->registrarExpedientes($listado);
    }

    public function getRegistrarProceso(){
        require_once __DIR__.'/../model/dto/ProcesoDTO.php';
        require_once __DIR__.'/../model/dto/AbogadoCasoDTO.php';
        $dto= new ProcesoDTO();
        $dto->setFechaInicio('1-3-2018');
        $dto->setJuez('fransisco');
        $dto->setFechaFin('1-3-2018');
        $dto->setTipoCaso('familiar');
        //cliente del proceso
        $dtoCliente= new ClienteDTO();
        $dtoCliente->setDni(2);
        //abogado encargado del proceso esto seria consultado la session;
        $dtoAbogado= new AbogadoDTO();
        $dtoAbogado->setDni(4);

        $dtoAbogadoCaso= new AbogadoCasoDTO();
        $dtoAbogadoCaso->setProceso($dto);
        $dtoAbogadoCaso->setAbogado($dtoAbogado);

        $dto->setAbogadoCaso($dtoAbogadoCaso);
        $dto->setCliente($dtoCliente);

        $service = new ProcesoService();
        // parametro  (dtoProceso,idCliente,idAbogado)
        $service->registrarProceso($dto);

    }

    public function getListarProcesos(){
        $service = new ProcesoService();
        $json=json_encode($service->listarProcesos());
        echo $json;
    }
