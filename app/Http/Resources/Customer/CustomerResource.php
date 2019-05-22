<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'name' => $this->first_name.' '.$this->last_name,
            'sex' => $this->gender,
            'email_address' => $this->email,
            'phone_no' => $this->phone_number,
            'status' => $this->account_status,
            'points' => $this->points,
            'bookings_count' => $this->bookings->count(),
            'bookings_total_cost' => $this->bookings->sum('cost'),
            'reviews_count' => $this->reviews->count(),
            'href' => [
                'bookings' => route('bookings.index',$this->id),
                'reviews' => route('reviews.index', $this->id)
            ]
        ];
    }
}
