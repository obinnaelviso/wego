<?php

namespace App\Model;

use App\Model\Booking;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function booking() {
    	return $this->belongsTo(Booking::class);
    }

    public function customer() {
    	return $this->belongsTo(Customer::class);
    }
}
