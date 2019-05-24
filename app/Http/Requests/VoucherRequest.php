<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoucherRequest extends FormRequest
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
            'money_value' => 'required|integer',
            'used' => 'required|integer',
            'remaining' => 'required|integer',
            'validity_date' => 'required',
            'expiry_date' => 'required',
        ];
    }
}
