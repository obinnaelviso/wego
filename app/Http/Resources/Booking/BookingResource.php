<?php

namespace App\Http\Resources\Booking;

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
            'cost' => $this->cost,
            'duration' => $this->booking_time->duration,
            'pickup_address' => $this->location,
            'car' => $this->car->name,
            'car_category' => $this->car->car_model->car_category->name,
            'car_plate_number' => $this->car->plate_number,
            // 'extra_hours' => $this->extra_hour->hours,
            // 'cost_withExtraHour'=>$this->cost + $this->extra_hour->cost,
            'status' => $this->status,
            'google_map_link' => $this->location_link
        ];
    }
}
