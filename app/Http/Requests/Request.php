<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function failedValidation(Validator $validator) {
        $response = [];
        $response['message'] = 201;
        $response['error'] =  $validator->errors()->all();
        $response['data'] = [];
        throw new HttpResponseException(response()->json($response, 200));
    }
}
