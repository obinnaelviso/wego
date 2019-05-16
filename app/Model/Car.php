<?php

namespace App\Model;

use App\Model\CarModel;
use App\Model\Booking;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
	protected $fillable = ['name', 'description', 'discount', 'plate_number', 'price', 'stock'];
    public function car_model() {
    	return $this->belongsTo(CarModel::class);
    }
    public function bookings() {
    	return $this->hasMany(Booking::class);
    }
}
