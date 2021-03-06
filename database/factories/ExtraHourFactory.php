<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\ExtraHour;
use App\Model\Customer;
use App\Model\Booking;
use Faker\Generator as Faker;

$factory->define(ExtraHour::class, function (Faker $faker) {
    return [
        'customer_id' => function() {
        	return Customer::all()->random();
        },
        'booking_id' => function() {
        	return Booking::all()->random();
        },
        'cost_perHour' => $faker->numberBetween(100,1000),
        'hours' => $faker->randomDigitNotNull,
        'cost' => $faker->numberBetween(1000,10000),

    ];
});
