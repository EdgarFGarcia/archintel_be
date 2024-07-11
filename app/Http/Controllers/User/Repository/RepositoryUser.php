<?php

namespace App\Http\Controllers\User\Repository;

/**
 * repository interface
 */
use App\Http\Controllers\User\Repository\Interface\IRepositoryUser;

/**
 * model
 */
use App\Models\User;

class RepositoryUser implements IRepositoryUser
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
    ) : object{
        return User::create($data);
    }

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
    ) : object | null{
        return User::where($where);
    }

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
    ) : int | bool{
        return User::where('id', $user_id)
        ->update($data);
    }

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
    ) : int | bool{
        return User::where('id', $user_id)->delete();
    }
}
