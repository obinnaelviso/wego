<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Point;
use Faker\Generator as Faker;

$factory->define(Point::class, function (Faker $faker) {
    return [
        'version' => $faker->bothify('v#.#.##'),
        'value' => $faker->numberBetween(100,5000)
    ];
});
