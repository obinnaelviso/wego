<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoucherResource extends JsonResource
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
            'voucher_pin' => $this->voucher_id,
            'money_value' =>$this->value,
            'used' => $this->count,
            'remaining' => $this->stock,
            'validity_date' => $this->start_date,
            'expiry_date' => $this->end_date,
            'voucher_stat' => $this->status
        ];
    }
}
