<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class BookingTimeResource extends Resource
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
            'booking_type' => $this->name,
            'booking_hours' => $this->duration
        ];
    }
}
