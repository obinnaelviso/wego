<?php

namespace App\Http\Resources\ExtraHour;

use Illuminate\Http\Resources\Json\Resource;

class ExtraHourCollection extends Resource
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
            'customer' => $this->customer->first_name.' '.$this->customer->last_name,
            'time' => $this->created_at,
            'total_hours' => $this->hours,
            'href' => [
                'extra_hour' => route('extra-hours.show', [$this->customer->id, $this->booking->id, $this->id])
            ]
        ];
    }
}
