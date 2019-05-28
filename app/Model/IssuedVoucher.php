<?php

namespace App\Model;

use App\Model\Customer;
use App\Model\Voucher;
use Illuminate\Database\Eloquent\Model;

class IssuedVoucher extends Model
{
    public function customer() {
    	return $this->belongsTo(Customer::class);
    }
    public function voucher() {
    	return $this->belongsTo(Voucher::class);
    }
}
