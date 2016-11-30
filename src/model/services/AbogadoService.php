<?php
require_once __DIR__ . '/../factory/TransactionManager.php';
require_once __DIR__.'/../dao/AbogadoDAO.php';
/**
 * Created by PhpStorm.
 * User: McBro
 * Date: 16/11/2016
 * Time: 4:50 PM
 */
class AbogadoService
{
    /**
     * @param AbogadoDTO $dto
     */
  public function registrar($dto)
    {
        try {
            $manager = new TransactionManager(true);
            //registro abogado
            $abogadoDAO = $manager->getDAO("AbogadoDAO");
            $dto->setPassword(md5($dto->getPassword()));
            $abogadoDAO->registrar($dto);
            //registro especialidad abogado
            $especialidadDAO =$manager->getDAO('EspecialidadDAO');
            $especialidadDAO->registrarListadoEspecialidad($dto->getDni(),$dto->getAbogadoEspecialidad());
            $manager->flush();
        } catch (Exception $e) {

            echo $e;
            if (isset($manager)) {
                $manager->rollback();
            }
        }
        finally{

            if (isset($manager)) {
                $manager->close();
            }
        }
    }

    /**
     * Metodo- elimina una de las especialidades de una abogado
     * @param  AbogadoDTO $dto
     */
     public function actualizar($dto){
        try {
            $manager = new TransactionManager(true);
            //actualiza abogado
            $abogadoDAO = $manager->getDAO("AbogadoDAO");
            if($dto->getPassword()!==''){
                $dto->setPassword(md5($dto->getPassword()));
            }
            $abogadoDAO->actualizar($dto);
            //actualiza especialidades abogado
            $especialidadDAO=$manager->getDAO('EspecialidadDAO');
            $especialidadDAO->eliminarEspecialidad($dto->getDni());
            if($dto->getAbogadoEspecialidad()!==null){
                $especialidadDAO->registrarListadoEspecialidad($dto->getDni(),$dto->getAbogadoEspecialidad());
            }

            $manager->flush();
        } catch (Exception $e) {

            echo $e;
            if (isset($manager)) {
                $manager->rollback();
            }
        }
        finally{

            if (isset($manager)) {
                $manager->close();
            }
        }

    }

    public function listado(){
      $listado=null;
      try {
        $manager=new TransactionManager(true);
        $dao=$manager->getDAO('AbogadoDAO');
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
    
    public function listadoEspecialidades(){
        $listado=null;
        try {
            $manager=new TransactionManager(true);
            $dao=$manager->getDAO('EspecialidadDAO');
            $listado=$dao->listarEspecialidades();
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
    
    public function listarEspecializaciones($nit){
      $listado=null;
      try {
        $manager=new TransactionManager(true);
        $dao=$manager->getDAO('EspecialidadDAO');
        $listado=$dao->findBy($nit);
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
    
}
