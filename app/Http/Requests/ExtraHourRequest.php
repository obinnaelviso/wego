<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtraHourRequest extends FormRequest
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
            // 'customer_id' => 'required|integer',
            // 'booking_id' => 'required|integer',
            'cost_per_hr' => 'required',
            'total_hours' => 'required|integer',
            // 'total_cost' => 'required'
        ];
    }
}
