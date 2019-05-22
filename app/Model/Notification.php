<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Customer;

class Notification extends Model
{
	protected $fillable = ['type','status','description']; 

	public function customer() {
		return $this->belongsTo(Customer::class);
	}
}
