<?php

/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 07/07/2016
 * Time: 11:04 PM
 */
interface IUsuario
{
    /**
     * @param $dto UsuarioDTO
     * @return array
     */
    public function saved($dto);

    /**
     * @param $dto UsuarioDTO
     * @return array
     */
    public function update($dto);
    public function  findBy($id);
}