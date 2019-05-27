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
            'car' => $this->car->name,
            'car_plate_no' => $this->car->plate_number,
            'car_colour' => $this->car->colour,
            'car_year' => $this->car->year,
            'car_model' => $this->car->car_model->name,
            'car_category' => $this->car->car_model->car_category->name,
            'points' => $this->pts,
            'google_map_link' => $this->location_link
        ];
    }
}
