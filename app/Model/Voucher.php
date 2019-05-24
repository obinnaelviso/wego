<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = ['value', 'count', 'stock', 'start_date', 'end_date'];
}
