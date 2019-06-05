<?php

namespace App\Model;

use App\Model\Driver;
use App\Model\Booking;
use App\Model\CarDriver;
use App\Model\CarMake;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
	protected $fillable = ['name', 'booking_percent', 'plate_number', 'year', 'colour', 'img_path'];
    public function car_make() {
    	return $this->belongsTo(CarMake::class);
    }
    public function driver() {
    	return $this->belongsTo(Driver::class);
    }
    public function bookings() {
    	return $this->hasMany(Booking::class);
    }
    public function car_drivers() {
        return $this->hasMany(CarDriver::class);
    }
}
