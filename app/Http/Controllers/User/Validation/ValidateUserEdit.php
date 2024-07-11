<?php

namespace App\Http\Controllers\User\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ValidateUserEdit extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'email'                 => 'sometimes|email|unique:users,email,' . $this->user_id,
            'name'                  => 'sometimes|string',
            'firstname'             => 'sometimes|string',
            'lastname'              => 'sometimes|string',
            'user_type_id'          => 'sometimes|numeric',
            'user_status_id'        => 'sometimes|numeric',
            'password'              => 'sometimes|string'
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
