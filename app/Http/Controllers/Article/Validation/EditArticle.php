<?php

namespace App\Http\Controllers\Article\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class EditArticle extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'image'                             => 'sometimes|string',
            'title'                             => 'sometimes|string',
            'link'                              => 'sometimes|string',
            'date_created'                      => 'sometimes|date',
            'content'                           => 'sometimes|string',
            'company_id'                        => 'sometimes|numeric',
            'article_status_id'                 => 'sometimes|numeric'
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
