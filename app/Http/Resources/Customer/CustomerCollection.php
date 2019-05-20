<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\Resource;

class CustomerCollection extends Resource
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
            'name' => $this->first_name.' '.$this->last_name,
            'gender' => $this->gender,
            'email' => $this->email,
            'href' => [
                'customer' => route('customer.show',$this->id),
            ]
        ];
    }
}
