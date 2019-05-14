<?php

namespace App\Model;

use App\Model\CarModel;
use Illuminate\Database\Eloquent\Model;

class CarCategory extends Model
{
    public function car_models() {
    	return $this->hasMany(CarModel::class);
    }
}
