<?php

namespace App\Model;

use App\Model\CarModel;
use App\Model\CarCategory;
use Illuminate\Database\Eloquent\Model;

class CarMake extends Model
{
	protected $fillable = ['name'];
    public function car_models() {
    	return $this->hasMany(CarModel::class);
    }

    public function car_category() {
    	return $this->belongsTo(CarCategory::class);
    }
}
