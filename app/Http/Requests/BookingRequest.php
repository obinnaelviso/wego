<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'booking_time_id' => 'required|integer',
            'car_id' => 'required|integer',
            'date' => 'required',
            'cost' => 'required',
            'status' => 'required|string',
            'pickup_address' => 'required|string',
            'google_map_link' => 'required|string'
        ];
    }
}
