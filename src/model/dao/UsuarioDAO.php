<?php

/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 08/07/2016
 * Time: 12:08 AM
 */
class UsuarioDAO implements IUsuario
{
    /**
     * @var Connection
     */
    private $connection;

    /**
     * UsuarioDAO constructor.
     * @param $con Connection
     */
    public function __construct($con)
    {
        $this->connection=$con;
    }

    /**
     * @param $dto UsuarioDTO
     * @return array
     */
    public function saved($dto)
    {
        // TODO: Implement saved() method.
    }

    /**
     * @param $dto UsuarioDTO
     * @return array
     */
    public function update($dto)
    {
        // TODO: Implement update() method.
    }

    public function findBy($id)
    {
        // TODO: Implement findBy() method.
    }
}