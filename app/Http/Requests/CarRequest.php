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
            'car_name' => 'required|max:255|unique:cars,name',
            'color' => 'required|string',
            'plate_no' => 'required|string',
            'in_stock' => 'required|integer',
            'cost' => 'required|integer',
            'percentage' => 'required|integer',
            'car_year' => 'required|integer'
        ];
    }
}
