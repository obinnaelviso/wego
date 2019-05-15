<?php

namespace App\Http\Resources\CarCategory;

use Illuminate\Http\Resources\Json\Resource;

class CarCategoryCollection extends Resource
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
            'href' => [
                'car_models' => route('car-models.index',$this->id),
            ]
        ];
    }
}
