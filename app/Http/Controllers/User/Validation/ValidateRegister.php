<?php

namespace App\Http\Controllers\User\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ValidateRegister extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'email'                 => 'required|unique:users,email',
            'name'                  => 'required|string',
            'firstname'             => 'required|string',
            'lastname'              => 'required|string',
            'user_type_id'          => 'required|numeric',
            'user_status_id'        => 'required|numeric',
            'password'              => 'required|string'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'response'      => false,
            'message'       => 'Validation Error',
            'data'          => $validator->errors()
        ], 422));
    }

    public function messages()
    {
        return [];
    }
}
