<?php

namespace App\Model;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class FrontdeskAdmin extends Model
{
    protected $guard = 'frontdeskAdmin';
    protected $fillable = [
		'first_name','last_name','email','password','gender','phone_number'
	];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($password) {
    	$this->attributes['password'] = Hash::make($password);
    }
}
