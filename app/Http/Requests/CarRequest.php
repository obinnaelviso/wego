<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class CarRequest extends Request
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
            'plate_no' => 'required|string|unique:cars,plate_number',
            'in_stock' => 'required|integer',
            'cost' => 'required|integer',
            'percentage' => 'required|integer',
            'color' => 'required|string',
            'car_year' => 'required|integer',
            'car_img' => 'required|string'
        ];
    }
}
