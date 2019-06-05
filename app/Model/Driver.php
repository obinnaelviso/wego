<?php

namespace App\Model;

use App\Model\Driver;
use App\Model\Car;
use App\Model\Booking;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Driver extends Model
{
	protected $guard = 'driver';
    protected $fillable = [
		'first_name','last_name','email','password','gender','phone_number'
	];
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function setPasswordAttribute($password) {
    	$this->attributes['password'] = Hash::make($password);
    }
    
    public function location() {
    	return $this->belongsTo(Location::class);
    }

    public function car_models() {
        return $this->hasMany(CarModel::class);
    }

    public function booking() {
        return $this->hasOne(Booking::class);
    }
}
