<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|unique:car_models',
            'description' => 'required|string',
            'plate_number' => 'required|string',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'discount' => 'required|integer'
        ];
    }
}
