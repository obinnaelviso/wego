<?php

namespace App\Http\Resources\NotificationType;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationTypeResource extends JsonResource
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
            'type' => $this->name,
            'href' => [
                'notifications': route('notifications.type', $this->id)
            ]
        ];
    }
}
