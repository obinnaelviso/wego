<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'car_name' => $this->name,
            'car_model' => $this->car_model->name,
            'plate_no' => $this->plate_number,
            'in_stock' => $this->stock,
            'cost' => $this->price,
            'color' => $this->colour,
            'car_year' =>$this->year,
            'bookings_count' => $this->bookings->count(),
            'percentage' => $this->booking_percent
        ];
    }
}
