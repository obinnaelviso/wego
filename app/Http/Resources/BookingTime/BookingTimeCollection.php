<?php

namespace App\Http\Resources\BookingTime;

use Illuminate\Http\Resources\Json\Resource;

class BookingTimeCollection extends Resource
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
            'name' => $this->name,
            'duration' => $this->duration
        ];
    }
}
