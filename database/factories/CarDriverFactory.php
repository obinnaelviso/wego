<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\CarModel;
use App\Model\Driver;
use App\Model\CarDriver;
use Faker\Generator as Faker;

$factory->define(CarDriver::class, function (Faker $faker) {
    return [
        'car_model_id' => function() {
            return CarModel::all()->random();
        },
        'driver_id' => function() {
            return Driver::all()->random();
        },
        'plate_number' => $faker->bothify('???#####'),
        'year' => $faker->year($max = 'now'),
        'colour' => $faker->colorName,
        'default_img' => $faker->bothify('/?????/?????/????.png'),
        'status' => 1
    ];
});
