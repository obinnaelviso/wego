<?php

namespace App\Model;

use App\Model\Notification;
use Illuminate\Database\Eloquent\Model;

class NotificationType extends Model
{
    protected $fillable = ['name'];

    public function notifications() {
    	return $this->hasMany(Notification::class);
    }
}
