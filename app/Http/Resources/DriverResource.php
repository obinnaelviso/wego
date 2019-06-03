<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
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
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'sex' => $this->gender,
            'email_address' => $this->email,
            'location_assigned' => $this->location->name,
            'phone_no' => $this->phone_number,
            'address' => $this->home_address,
            'bank_verification_no' => $this->bvn,
            'drivers_license_img' => $this->drivers_license,
            'acc_name' => $this->account_name,
            'acc_number' => $this->account_number,
            'acc_type' => $this->account_type,
            'bank_name' => $this->bank
        ];
    }
}
