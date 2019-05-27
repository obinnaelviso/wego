<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class CustomerRequest extends Request
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
            'email_address' => 'required|unique:customers,email|email',
            'password' => 'required|min:6',
            'sex' => 'required',
            'phone_no' => 'required'
        ];
    }
}
