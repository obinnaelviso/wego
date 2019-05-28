<?php

namespace App\Model;

use App\Model\IssuedVoucher;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = ['value', 'count', 'stock', 'start_date', 'end_date'];

    public function issued_vouchers() {
        return $this->hasMany(IssuedVoucher::class);
    }
}
