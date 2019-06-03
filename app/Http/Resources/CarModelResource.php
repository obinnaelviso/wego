<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarModelResource extends JsonResource
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
            'car_model' => $this->name,
            'car_make' => $this->car_make->name,
            'plate_no' => $this->plate_number,
            'cost' => $this->price,
            'color' => $this->colour,
            'car_year' =>$this->year,
            'bookings_count' => $this->bookings->count(),
            'percentage' => $this->booking_percent,
            'image' => $this->img_path,
        ];
    }
}
