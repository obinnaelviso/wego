<?php

namespace App\Model;

use App\Model\Driver;
use App\Model\DriverLocation;
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
    
    public function driver_locations() {
    	return $this->hasMany(DriverLocation::class);
    }
}
