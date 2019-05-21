<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Review;
use App\Model\Customer;
use App\Model\Booking;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'customer_id' => function() {
        	return Customer::all()->random();
        },
        'booking_id' => function() {
            return Booking::all()->random();
        },
        'review' => $faker->paragraph,
        'star' => $faker->numberBetween(0,5),
        'status' => $faker->word
    ];
});
