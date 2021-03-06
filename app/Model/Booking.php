<?php

namespace App\Model;

use App\Model\Customer;
use App\Model\Driver;
use App\Model\CarModel;
use App\Model\BookingTime;
use App\Model\ExtraHour;
use App\Model\Review;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['booking_time_id','car_id','time', 'cost', 'status', 'pts', 'location', 'location_link'];
    
    public function customer() {
    	return $this->belongsTo(Customer::class);
    }

    public function driver() {
        return $this->belongsTo(Driver::class);
    }

    public function car_model() {
    	return $this->belongsTo(CarModel::class);
    } 

    public function booking_time() {
    	return $this->belongsTo(BookingTime::class);
    }

    public function extra_hours() {
    	return $this->hasMany(ExtraHour::class);
    }

    public function review() {
        return $this->hasOne(Review::class);
    }
}
