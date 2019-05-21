<?php

namespace App\Http\Resources\ExtraHour;

use Illuminate\Http\Resources\Json\JsonResource;

class ExtraHourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            // 'customer' => $this->customer->first_name.' '.$this->customer->last_name,
            'time' => $this->booking->time,
            'cost_perHour' => $this->cost_perHour,
            'hours' => $this->hours,
            'cost' => $this->cost,
            'href' => [
                'all_extra_hours' => route('extra-hours.index')
            ]
        ];
    }
}
