<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Voucher;
use Faker\Generator as Faker;

$factory->define(Voucher::class, function (Faker $faker) {
    return [
        'voucher_id' => $faker->bothify('???#####'),
        'value' => $faker->numberBetween(2,100),
        'count' => $faker->randomDigit,
        'stock' => $faker->randomDigit,
        'start_date' => $faker->dateTime,
        'end_date' => $faker->dateTime
    ];
});
