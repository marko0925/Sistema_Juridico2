<?php
require_once __DIR__ . '/../factory/TransactionManager.php';
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 22/11/2016
 * Time: 5:27 PM
 */
class ProcesoService
{
    /**
     * Metodo- retorna un array<CitaDTO> de todos las citas que se han generado por todos los procesos
     */
    public function listarCitas(){
        $listado=null;
        try {
            $manager=new TransactionManager(true);
            $dao=$manager->getDAO('CitaDAO');
            $listado=$dao->listar();
        } catch (Exception $e) {
            echo $e;
        }
        finally{
            if(isset($manager)){
                $manager->close();
            }
        }
        return $listado;
    }

    /**
     * @param CitaDTO $cita
     * @param $idAbogado
     * @param $idProceso
     */
    public function registrarCita($cita,$idAbogado,$idProceso){
        try {
            $manager=new TransactionManager(true);
            $daoAbogadoCaso=$manager->getDAO('AbogadoCasoDAO');
            $dtoAbogadoCaso=$daoAbogadoCaso->buscar($idAbogado,$idProceso);
            $cita->setAbogadoCaso($dtoAbogadoCaso);
            $daoCita=$manager->getDAO('CitaDAO');
            $daoCita->registrar($cita);
            $manager->flush();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        finally{
            if(isset($manager)){
                $manager->close();
            }
        }

    }

    /**
     * @param CitaDTO $dto
     * @param int $idAbogado
     * @param int $idProceso
     */
    public function registrarObservacion($dto,$idAbogado,$idProceso){
        try {
            $manager=new TransactionManager(true);
            $daoAbogadoCaso=$manager->getDAO('AbogadoCasoDAO');
            $dtoAbogadoCaso=$daoAbogadoCaso->buscar($idAbogado,$idProceso);
            $dto->setAbogadoCaso($dtoAbogadoCaso);
            $daoObservacion=$manager->getDAO('ObservacionDAO');
            $daoObservacion->registrar($dto);
            $manager->flush();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        finally{
            if(isset($manager)){
                $manager->close();
            }
        }

    }

    /**
     * @param string $idAbogado
     * @return array
     */
    public function listarObservaciones($idAbogado){
        $listado=null;
        try {
            $manager=new TransactionManager(true);
            $dao=$manager->getDAO('ObservacionDAO');
            $listado=$dao->listar($idAbogado);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        finally{
            if(isset($manager)){
                $manager->close();
            }
        }
        return $listado;

    }

    public function registrarExpedientes($listado){

    }


}