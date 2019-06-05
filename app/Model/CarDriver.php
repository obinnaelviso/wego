<?php

namespace App\Model;

use App\Model\Driver;
use App\Model\CarModel;
use Illuminate\Database\Eloquent\Model;
use App\Model\CarDriver;

class CarDriver extends Model
{
    public function car_model() {
    	return $this->belongsTo(CarModel::class);
    }
    public function driver() {
    	return $this->belongsTo(Driver::class);
    }
}
