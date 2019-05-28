<?php

namespace App\Model;

use App\Model\Driver;
use App\Model\DriverLocation;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function driver_locations() {
    	return $this->hasMany(DriverLocation::class);
    }
}
