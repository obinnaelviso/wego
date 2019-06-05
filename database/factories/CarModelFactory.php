<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\CarModel;
use App\Model\CarMake;
use App\Model\Driver;
use Faker\Generator as Faker;

$factory->define(CarModel::class, function (Faker $faker) {
    return [
        'car_make_id' => function() {
            return CarMake::all()->random();
        },
        'name' => $faker->word,
        'price' => $faker->numberBetween(1000,30000),
        'booking_percent' => $faker->numberBetween(2,50),
        'img_path' => $faker->bothify('/???/??/???.png')
    ];
});
