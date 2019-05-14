<?php

namespace App\Model;

use App\Model\Booking;
use App\Model\Review;
use App\Model\ExtraHour;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function bookings() {
    	return $this->hasMany(Booking::class);
    }

    public function reviews() {
    	return $this->hasMany(Review::class);
    }

    public function extra_hours() {
    	return $this->hasMany(ExtraHour::class);
    }

}
