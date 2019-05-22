<?php

namespace App\Http\Resources\Notification;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'message'=>$this->description,
            'status'=>$this->status,
            'href' => [
                'customer_notifications' => route('notifications.customer-notifications', $this->customer->id),
                'all_notifications' => route('notifications.index')
            ]
        ];
    }
}
