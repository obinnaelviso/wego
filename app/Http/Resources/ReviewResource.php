<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'customer_name'=>$this->customer->first_name.' '.$this->customer->last_name,
            'booking_id'=>$this->booking->id,
            'booking_time'=>$this->booking->time,
            'booking_duration'=>$this->booking->booking_time->duration,
            'comment'=>$this->review,
            'ratings'=>$this->star,
        ];
    }
}
