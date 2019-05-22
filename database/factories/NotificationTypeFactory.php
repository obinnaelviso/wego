<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\NotificationType;
use Faker\Generator as Faker;

$factory->define(NotificationType::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
