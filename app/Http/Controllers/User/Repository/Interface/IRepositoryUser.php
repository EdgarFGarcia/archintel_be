<?php

namespace App\Http\Controllers\User\Repository\Interface;

interface IRepositoryUser
{
    /**
     * register a user
     * @params
     * array $data
     *
     * @return
     * object
     */
    public function register(
        array $data
    ) : object;

    /**
     * get user information
     * @params
     * array $where
     *
     * @return
     * object | null
     */
    public function getUserInformation(
        array $where
    ) : object | null;
}
