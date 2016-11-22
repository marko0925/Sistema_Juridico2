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

    private $estado = false;

    //creamos la conexión a la base de datos prueba
    public function __construct()
    {
        try {

            parent::__construct("pgsql:host=$this->host;port=$this->port;dbname=$this->dbname;user=$this->user;password=$this->pass");

        } catch (PDOException $e) {

            echo $e->getMessage();

        }

    }

    /**
     * desactivado por ahora
     * @return bool
     */
    public function beginTransaction()
    {
        if (!$this->estado){
            $this->estado=true;
            return parent::beginTransaction();
        }

    }

    /**
     * @param string $query
     * @param array $parametros
     * @return bool
     */
    public function save($query, $parametros)
    {
        $estado = false;
        $statement = $this->prepare($query);
        $this->beginTransaction();
        if ($statement->execute($parametros)) {
            $estado = true;
        }
        return $estado;
    }

    /**
     * Busca en la base de datos un listado estaticos de datos
     * @param string $query
     * @return array
     */
    public function findAll($query)
    {
        $statement = $this->prepare($query);
        $statement->execute();
        $listadoDTO = $statement->fetchAll();
        return $listadoDTO;
    }

    /**
     * Metodo- busca y filtra  en la base de datos
     * @param string $query
     * @param array $parametros
     * @return array|null
     */
    public function findBy($query,$parametros)
    {
        $result=null;
        $statement = $this->prepare($query);
        $statement->execute($parametros);
        $result=$statement->fetchAll();
        return $result;
    }

}
