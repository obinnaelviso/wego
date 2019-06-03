<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
            'customer_name' =>$this->customer->first_name.' '.$this->customer->last_name,
            'date' => $this->time,
            'total_cost' => $this->cost,
            'booking_type' => $this->booking_time->name,
            'booking_hours' => $this->booking_time->duration,
            'pickup_address' => $this->location,
            'car_model' => $this->car_model->name,
            'car_plate_no' => $this->car_model->plate_number,
            'car_colour' => $this->car_model->colour,
            'car_year' => $this->car_model->year,
            'car_make' => $this->car_model->car_make->name,
            'points' => $this->pts,
            'google_map_link' => $this->location_link
        ];
    }
}
