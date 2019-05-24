<?php

namespace App\Http\Resources\Point;

use Illuminate\Http\Resources\Json\JsonResource;

class PointResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'rate'=>$this->value,
            'version'=>$this->version
        ];
    }
}
