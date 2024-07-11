<?php

namespace App\Http\Controllers\User\Service;

/**
 * laravel helper facade | eloquents
 */
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

/**
 * interface
 */
use App\Http\Controllers\User\Service\Interface\IServiceUser;

/**
 * repository concrete class
 */
use App\Http\Controllers\User\Repository\RepositoryUser;

class ServiceUser implements IServiceUser
{
    /**
     * class properties
     */
    protected $repo_user;

    /**
     * DIP
     * @App\Http\Controllers\User\Repository\RepositoryUser
     */
    function __construct(
        RepositoryUser $repo_user
    ){
        $this->repo_user = $repo_user;
    }

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
    ) : object{
        $data['password'] = Hash::make($data['password']);
        return $this->repo_user->register($data);
    }

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
    ) : object{
        return $this->repo_user->getUserInformation($where);
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
        return $this->repo_user->updateUser($data, $user_id);
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
        return $this->repo_user->deleteUser($user_id);
    }

    /**
     |-----------------------------------------------------------
     |non intefaced behaviors
     |----------------------------------------------------------
     */
    /**
     * login logic
     * @params
     * array $data
     *
     * @return
     * object | null
     */
    public function login(
        array $data
    ) : array | null {
        $is_auth = Auth::attempt($data);
        if($is_auth){
            $user_information = $this->getUserInformation(['id' => Auth::user()->id])
                ->with('getUserType', 'getUserStatus')
                ->first();
            return [
                'token'             => $this->generateToken($user_information)->plainTextToken,
                'user_information'  => $user_information
            ];
        }
        return null;
    }

    /**
     * get user list
     * @params
     * int $user_id = null
     *
     * @return
     * object
     */
    public function getUsers(
        int $user_id = null
    ) : object | array | null{
        if(is_null($user_id)){
            return $this->getUserInformation([])
            ->with('getUserType', 'getUserStatus')
            ->get();
        }
        return $this->getUserInformation(['id' => $user_id])
        ->with('getUserType', 'getUserStatus')
        ->first();
    }

    /**
     * generate token
     * @params
     * Model $data
     *
     * @return
     * object
     */
    public function generateToken(
        Model $data
    ){
        if($data->user_type_id == 2){
            /**
             * writer
             * abilities should be added as a database fetch record, for much cleaner approach
             */
            return $data->createToken($data->email, [
                'article:create',
                'article:edit',
                'article:delete'
            ]);
        }
        if($data->user_type_id == 3){
            // editor
            return $data->createToken($data->email, [
                'article:create',
                'article:edit',
                'article:delete',
                'user:create',
                'user:edit',
                'user:delete',
                'company:create',
                'company:edit',
                'company:delete'
            ]);
        }
        return $data->createToken($data->email);
    }
}
