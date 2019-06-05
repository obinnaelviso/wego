<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Booking;
use App\Model\CarModel;
use App\Model\Customer;
use App\Model\BookingTime;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    return [
        'car_model_id' => function() {
        	return CarModel::all()->random();
        },
        'customer_id' => function() {
        	return Customer::all()->random();
        },
        'booking_time_id' => function() {
        	return BookingTime::all()->random();
        },
        'car_year' => $faker->year($max = 'now'),
        'car_colour' => $faker->colorName,
        'cost' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 100000),
        'time' => $faker->dateTime,
        'location' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'location_link' => $faker->url,
        'pts' => $faker->randomDigit
    ];
});
