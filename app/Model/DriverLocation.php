<?php

namespace App\Model;

use App\Model\Driver;
use App\Model\Location;
use Illuminate\Database\Eloquent\Model;

class DriverLocation extends Model
{
    public function driver() {
    	return $this->belongsTo(Driver::class);
    }
    public function location() {
    	return $this->belongsTo(Location::class);
    }
}
