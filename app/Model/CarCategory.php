<?php

namespace App\Model;

use App\Model\CarModel;
use Illuminate\Database\Eloquent\Model;

class CarCategory extends Model
{
	protected $fillable = ['name']; 

    public function car_models() {
    	return $this->hasMany(CarModel::class);
    }
}
