<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Voucher;
use Faker\Generator as Faker;

$factory->define(Voucher::class, function (Faker $faker) {
    return [
        'voucher_id' => "GOGO".strtoupper(sha1(time())),
        'value' => $faker->numberBetween(2,100),
        'stock' => $faker->randomDigit,
        'start_date' => $faker->dateTime,
        'end_date' => $faker->dateTime
    ];
});
