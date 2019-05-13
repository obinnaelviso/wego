<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\CarModel;
use App\Model\CarCategory;
use Faker\Generator as Faker;

$factory->define(CarModel::class, function (Faker $faker) {
    return [
        'car_category_id' => function() {
        	return CarCategory::all()->random();
        },
        'name' => $faker->word
    ];
});
