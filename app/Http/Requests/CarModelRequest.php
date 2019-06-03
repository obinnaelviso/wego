<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Foundation\Http\FormRequest;

class CarModelRequest extends Request
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
            'car_model' => 'required|max:255|unique:car_models,name',
            'color' => 'required|string',
            'plate_no' => 'required|string|unique:car_models,plate_number',
            'cost' => 'required|integer',
            'percentage' => 'required|integer',
            'color' => 'required|string',
            'car_year' => 'required|integer',
            'car_img' => 'required|string'
        ];
    }
}
