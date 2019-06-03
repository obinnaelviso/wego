<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DriverRequest extends Request
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
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email_address' => 'required|unique:drivers,email|email',
            'password' => 'required|min:6',
            'sex' => 'required',
            'phone_no' => 'required',
            'address' => 'required',
            'bank_verification_no' => 'required',
            'drivers_license_img' => 'required',
            'acc_name' => 'requierd',
            'acc_number' => 'required',
            'acc_type' => 'required',
            'bank_name' => 'required',
            // Confirm Cars
            'car_name' => 'required|max:255|unique:cars,name',
            'color' => 'required|string',
            'plate_no' => 'required|string|unique:cars,plate_number',
            'cost' => 'required|integer',
            'percentage' => 'required|integer',
            'color' => 'required|string',
            'car_year' => 'required|integer',
            'car_img' => 'required|string'
        ];
    }
}
