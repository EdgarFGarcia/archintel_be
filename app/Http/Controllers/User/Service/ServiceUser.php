<?php

namespace App\Http\Controllers\User\Service;

/**
 * laravel helper facade
 */
use Illuminate\Support\Facades\Auth;
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
        return $data->createToken($data->email);
    }
}
