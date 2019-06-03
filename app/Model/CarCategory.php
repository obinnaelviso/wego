<?php

namespace App\Model;

use App\Model\CarMake;
use Illuminate\Database\Eloquent\Model;

class CarCategory extends Model
{
	protected $fillable = ['name']; 

    public function car_makes() {
    	return $this->hasMany(CarMake::class);
    }
}
