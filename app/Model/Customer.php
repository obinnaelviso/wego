<?php

namespace App\Model;

use App\Model\Booking;
use App\Model\Review;
use App\Model\Voucher;
use App\Model\ExtraHour;
use App\Model\Notification;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	protected $fillable = [
		'first_name','last_name','email','password','gender','phone_number'
	];

    public function bookings() {
    	return $this->hasMany(Booking::class);
    }

    public function reviews() {
    	return $this->hasMany(Review::class);
    }

    public function extra_hours() {
    	return $this->hasMany(ExtraHour::class);
    }

    public function notifications() {
        return $this->hasMany(Notification::class);
    }
}
