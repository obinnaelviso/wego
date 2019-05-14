<?php

namespace App\Model;

use App\Model\Customer;
use App\Model\Car;
use App\Model\BookingTime;
use App\Model\ExtraHour;
use App\Model\Review;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function customer() {
    	return $this->belongsTo(Customer::class);
    }

    public function car() {
    	return $this->belongsTo(Car::class);
    } 

    public function booking_time() {
    	return $this->belongsTo(BookingTime::class);
    }

    public function extra_hours() {
    	return $this->hasMany(ExtraHour::class);
    }

    public function review() {
        return $this->hasOne(Review::class);
    }
}
