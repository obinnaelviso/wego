<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Notification;
use App\Model\Customer;
use Faker\Generator as Faker;

$factory->define(Notification::class, function (Faker $faker) {
    return [
        'customer_id' => function() {
        	return Customer::all()->random();
        },
        'type' => $faker->word,
        'status' => $faker->word,
        'description' => $faker->paragraph,


    ];
});
