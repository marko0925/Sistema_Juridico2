<?php

/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 07/07/2016
 * Time: 10:52 PM
 */
class Connection extends PDO
{

   //nombre base de datos
   private $dbname = "Sistema_Juridico";
   //nombre servidor
   private $host = "sandbox2.ufps.edu.co";
   //nombre usuarios base de datos
   private $user = "postgres";
   //password usuario
   private $pass = "ufps";
   //puerto postgreSql
   private $port = 5432;
   private $dbh;

   //creamos la conexión a la base de datos prueba
   public function __construct()
   {
       try {

           $this->dbh = parent::__construct("pgsql:host=$this->host;port=$this->port;dbname=$this->dbname;user=$this->user;password=$this->pass");

       } catch(PDOException $e) {

           echo  $e->getMessage();

       }

   }

   //función para cerrar una conexión pdo
   public function close_con()
   {

       $this->dbh = null;

   }
   
   public function save($query,$parametros){
       
   }
   public function findAll($query){
        $statement=  $this->dbh->prepare($query);
        $statement->execute();
        return $statement->fetchAll();
   }
   public function findBy(){
       
   }

}
