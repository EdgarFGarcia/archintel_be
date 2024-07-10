<?php

namespace App\Http\Controllers\User\Service\Interface;

interface IServiceUser
{
    /**
     * register a user
     * @params
     * array $data
     *
     * @return
     * object
     */
    public function registerUser(
        array $data
    ) : object;

    /**
     * get user information
     * @params
     * array $where
     *
     * @return
     * object
     */
    public function getUserInformation(
        array $where
    ) : object;


}
