<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Car;
use App\Model\CarModel;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'car_model_id' => function() {
        	return CarModel::all()->random();
        },
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'stock' => $faker->randomDigit,
        'price' => $faker->numberBetween(1000,30000),
        'plate_number' => $faker->bothify('???#####'),
        'discount' => $faker->numberBetween(2,50)
    ];
});
