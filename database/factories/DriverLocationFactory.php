<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Driver;
use App\Model\Location;
use App\Model\DriverLocation;
use Faker\Generator as Faker;

$factory->define(DriverLocation::class, function (Faker $faker) {
    return [
        'driver_id' => function() {
        	return Driver::all()->random();
        },
        'location_id' => function() {
        	return Location::all()->random();
        },
    ];
});
