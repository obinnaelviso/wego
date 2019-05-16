<?php

namespace App\Http\Resources\Car;

use Illuminate\Http\Resources\Json\Resource;

class CarCollection extends Resource
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
            'model' => $this->car_model->name,
            'price' => $this->price,
            'discount' => $this->discount,
            'href' => [
                'car' => route('cars.show',[$this->car_model->car_category, $this->car_model, $this->id])
            ]
        ];
    }
}
