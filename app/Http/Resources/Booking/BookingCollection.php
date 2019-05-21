<?php

namespace App\Http\Resources\Booking;

use Illuminate\Http\Resources\Json\Resource;

class BookingCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'customer_name' =>$this->customer->first_name.' '.$this->customer->last_name,
            'date' => $this->time,
            'total_cost' => $this->cost,
            'booking_type' => $this->booking_time->name,
            'booking_hours' => $this->booking_time->duration,
            'href' => [
                'customer_booking' => route('bookings.index', $this->customer->id)
            ]
        ];
    }
}
