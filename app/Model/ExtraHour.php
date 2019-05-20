<?php

namespace App\Model;

use App\Model\Booking;
use App\Model\Customer;
use Illuminate\Database\Eloquent\Model;

class ExtraHour extends Model
{	
	protected $fillable = ['customer_id','booking_id','cost_perHour', 'hours', 'cost'];
	
	public function customer() {
    	return $this->belongsTo(Customer::class);
    }

    public function booking() {
    	return $this->belongsTo(Booking::class);
    }
}
