<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * validate include
 */
use App\Http\Controllers\User\Validation\ValidateLogin;
use App\Http\Controllers\User\Validation\ValidateRegister;

/**
 * service concrete class
 */
use App\Http\Controllers\User\Service\ServiceUser;

class UserController extends Controller
{
    /**
     * class properties
     */
    protected $service_user;

    /**
     * DIP
     * @App\Http\Controllers\User\Service\ServiceUser
     */
    function __construct(
        ServiceUser $service_user
    ){
        $this->service_user = $service_user;
    }

    /**
     * login a user
     * @params
     * Request $request
     *
     * validate inject
     * @App\Http\Controllers\User\Validation\ValidateLogin
     *
     * @return
     * mixed
     */
    public function login(
        ValidateLogin $request
    ) : object | null{
        try{
            $login_user = $this->service_user->login($request->validated());
            if($login_user){
                return response()->json([
                    'response'  => true,
                    'data'      => $login_user
                ], 200);
            }
            return response()->json([
                'response'  => false,
                'data'      => []
            ], 422);
        }catch(\Exception $e){
            return $this->error($e, 500);
        }
    }

    /**
     * register a user
     * @params
     * Request $request
     *
     * @return
     * object
     */
    public function register(
        ValidateRegister $request
    ) : object | null{
        try{
            $register_user = $this->service_user->registerUser($request->validated());
            if($register_user){
                return response()->json([
                    'response'  => true,
                    'message'   => 'Registration, successful!'
                ], 200);
            }
            return response()->json([
                'response'  => false,
                'message'   => "There's an error occured!"
            ], 422);
        }catch(\Exception $e){
            return $this->error($e, 500);
        }
    }
}
