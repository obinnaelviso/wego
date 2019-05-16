<?php

namespace App\Model;

use App\Model\Booking;
use App\Model\Customer;
use Illuminate\Database\Eloquent\Model;

class ExtraHour extends Model
{	
	public function customer() {
    	return $this->belongsTo(Customer::class);
    }

    public function booking() {
    	return $this->belongsTo(Booking::class);
    }
}
