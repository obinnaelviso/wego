<?php

namespace App\Model;

use App\Model\Car;
use App\Model\CarCategory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    public function cars() {
    	return $this->hasMany(Car::class);
    }

    public function car_category() {
    	return $this->belongsTo(CarCategory::class);
    }
}
