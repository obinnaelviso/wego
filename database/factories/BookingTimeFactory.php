<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\BookingTime;
use Faker\Generator as Faker;

$factory->define(BookingTime::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement($array = array ('Full Day','Half Day')),
        'duration' => $faker->randomElement($array = array (30,60)),
    ];
});
