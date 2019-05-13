<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Booking;
use App\Model\Car;
use App\Model\Customer;
use App\Model\BookingTime;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    return [
        'car_id' => function() {
        	return Car::all()->random();
        },
        'customer_id' => function() {
        	return Customer::all()->random();
        },
        'booking_time_id' => function() {
        	return BookingTime::all()->random();
        },
        'cost' => $faker->numberBetween(1000,10000),
        'time' => $faker->dateTime,
        'status' => $faker->word,
        'location' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'location_link' => $faker->url
    ];
});
