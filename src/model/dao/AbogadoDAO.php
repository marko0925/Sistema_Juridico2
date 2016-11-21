<?php

/**
 * Created by PhpStorm.
 * User: McBro
 * Date: 16/11/2016
 * Time: 4:55 PM
 */
class AbogadoDAO
{

    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function registrar()
    {

    }

    public function listar()
    {
        $sql = "select e._nombre, a._dni from _especialidad e INNER JOIN _abog_espec a ON e._nombre = a.nombre INNER JOIN _abogado ab ON a._dni = ab._dni";
        $resultSet = $this->con->findAll($sql);
        echo $resultSet;
    }
}