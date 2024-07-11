<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * validate include
 */
use App\Http\Controllers\User\Validation\ValidateLogin;
use App\Http\Controllers\User\Validation\ValidateRegister;
use App\Http\Controllers\User\Validation\ValidateUserEdit;

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

    /**
     * get users
     * @params
     * int $user_id = nullable
     *
     * @return
     * object
     */
    public function getUsers(
        int $user_id = null
    ) : object{
        try{
            $get_user = $this->service_user->getUsers($user_id);
            if($get_user){
                return response()->json([
                    'response'  => true,
                    'data'      => $get_user
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
     * update user information
     * @params
     * array $data
     *
     * inject
     * @App\Http\Controllers\User\Validation\ValidateUserEdit
     *
     * @return
     * object
     */
    public function updateUser(
        ValidateUserEdit $request,
        int $user_id
    ){
        try{
            $update_user = $this->service_user->updateUser($request->validated(), $user_id);
            if($update_user){
                return response()->json([
                    'response'  => true,
                    'message'   => 'updating user, successful!'
                ], 200);
            }
            return response()->json([
                'response'  => false,
                'message'   => 'something went wrong!'
            ], 422);
        }catch(\Exception $e){
            return $this->error($e, 500);
        }
    }

    /**
     * delete user
     * @params
     * int $user_id
     *
     * @return
     * object
     */
    public function deleteUser(
        int $user_id
    ) : object {
        try{
            $delete_user = $this->service_user->deleteUser($user_id);
            if($delete_user){
                return response()->json([
                    'response'  => true,
                    'message'   => "deleting user, successful!"
                ], 200);
            }
            return response()->json([
                'response'  => false,
                'message'   => 'something went wrong!'
            ], 422);
        }catch(\Exception $e){
            return $this->error($e, 500);
        }
    }
}
