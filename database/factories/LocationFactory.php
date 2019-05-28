<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Location;
use Faker\Generator as Faker;

$factory->define(Location::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});
