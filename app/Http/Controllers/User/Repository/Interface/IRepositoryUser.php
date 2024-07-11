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

    /**
     * update user information
     * @params
     * array $data,
     * int $user_id
     *
     * @return
     * int | bool
     */
    public function updateUser(
        array $data,
        int $user_id
    ) : int | bool;

    /**
     * delete user
     * @params
     * int $user_id
     *
     * @return
     * int | bool
     */
    public function deleteUser(
        int $user_id
    ) : int | bool;
}
