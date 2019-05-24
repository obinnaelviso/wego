<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Customer;
use App\Model\NotificationType;

class Notification extends Model
{
	protected $fillable = ['type','status','description']; 

	public function customer() {
		return $this->belongsTo(Customer::class);
	}
	public function notification_type() {
		return $this->belongsTo(NotificationType::class);
	}
}
