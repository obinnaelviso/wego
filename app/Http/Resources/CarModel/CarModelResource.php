<?php

namespace App\Http\Resources\CarModel;

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
            'name' => $this->name,
            'category' =>$this->car_category->name,
            'href' => [
                'car-categories' => route('car-categories.index'),
                'cars' => route('cars.index')
            ]
        ];
    }
}
