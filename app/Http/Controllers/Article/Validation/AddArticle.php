<?php

namespace App\Http\Controllers\Article\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class AddArticle extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'image'                             => 'required|string',
            'title'                             => 'required|string',
            'link'                              => 'required|string',
            'date_created'                      => 'required|date',
            'content'                           => 'required|string',
            'company_id'                        => 'required|numeric'
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
