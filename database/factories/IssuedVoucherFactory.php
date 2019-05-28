<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\IssuedVoucher;
use App\Model\Customer;
use App\Model\Voucher;
use Faker\Generator as Faker;

$factory->define(IssuedVoucher::class, function (Faker $faker) {
    return [
        'customer_id' => function() {
        	return Customer::all()->random();
        },
        'voucher_id' => function() {
        	return Voucher::all()->random();
        }
    ];
});
