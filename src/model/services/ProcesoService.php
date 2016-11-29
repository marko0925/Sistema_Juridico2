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
            if(isset($manager)){
                $manager->rollback();
            }
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
            if(isset($manager)){
                $manager->rollback();
            }
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

    public function registrarExpediente($dto){
        try {
            $manager=new TransactionManager(true);
            $daoExpediente=$manager->getDAO('ExpedienteDAO');
            $daoExpediente->registrar($dto);
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

    public function listarExpedientes($idProceso){
        $listado=null;
        try {
            $manager=new TransactionManager(true);
            $dao=$manager->getDAO('ExpedienteDAO');
            $listado=$dao->listar($idProceso);
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

    /**
     * Permite guardar un archivo en el servidor
     * @param $file
     * @return array
     */
    public function subirArchivoExpediente($file){
        $nombre= basename($file['name']);
        $directorio = __DIR__.'/../../protected/';
        $i=0;
        while (file_exists($directorio.$nombre)){
            $nombre=$i.''.$nombre;
            $i++;
        }
        if(move_uploaded_file($file['tmp_name'],$directorio)){
            return array('estado'=>true,'url'=>$directorio);
        }else{
            return array('estado'=>false,'url'=>null);
        }
    }

    /**
     * @param ProcesoDTO $dto
     */
    public function  registrarProceso($dto){
        $info= array('estado'=>false,'menssaje'=>'');
        try {
            $manager=new TransactionManager(true);
            //registrando proceso
            $daoProceso=$manager->getDAO('ProcesoDAO');
            $daoProceso->registrar($dto);

            //asignar abogado al caso
            $daoAbogadoCaso=$manager->getDAO('AbogadoCasoDAO');
            $daoAbogadoCaso->registrar($dto->getAbogadoCaso());

            $manager->flush();
        } catch (Exception $e) {
            echo $e->getMessage();
            if(isset($manager)){
                $manager->rollback();
            }
        }
        finally{
            if(isset($manager)){
                $manager->close();
            }
        }

    }


}
