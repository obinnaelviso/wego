<?php

namespace App\Model;

use App\Model\Driver;
use App\Model\Booking;
use App\Model\CarMake;
use App\Model\CarCategory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
	protected $fillable = ['name', 'booking_percent', 'plate_number', 'year', 'colour', 'img_path'];
    public function car_make() {
    	return $this->belongsTo(CarMake::class);
    }
    public function car_category() {
    	return $this->belongsTo(CarCategory::class);
    }
    public function driver() {
    	return $this->belongsTo(Driver::class);
    }
    public function bookings() {
    	return $this->hasMany(Booking::class);
    }
}
