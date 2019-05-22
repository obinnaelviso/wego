<?php

namespace App\Http\Resources\Notification;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationCollection extends JsonResource
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
            'type'=>$this->type,
            'notification'=>$this->description,
            'href' => [
                'notification' => route('notifications.show', [$this->customer->id, $this->id])
            ]
        ];
    }
}
