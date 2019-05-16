<?php

namespace App\Http\Resources\Car;

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
            'name' => $this->name,
            'model' => $this->car_model->name,
            'description' => $this->description,
            'plate_number' => $this->plate_number,
            'stock' => $this->stock,
            'price' => $this->price,
            'bookings_count' => $this->bookings->count(),
            'discount' => $this->discount,
            'href' => [
                'cars' => route('cars.index',[$this->car_model, $this->car_model->car_category]),
                'car_model' => route('car-models.index', $this->car_model->car_category->id)
            ]
        ];
    }
}
