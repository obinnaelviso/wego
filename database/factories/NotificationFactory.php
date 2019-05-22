<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Notification;
use App\Model\NotificationType;
use App\Model\Customer;
use Faker\Generator as Faker;

$factory->define(Notification::class, function (Faker $faker) {
    return [
        'customer_id' => function() {
        	return Customer::all()->random();
        },
        'notification_types_id' => function() {
        	return NotificationType::all()->random();
        },
        'msg' => $faker->paragraph,
    ];
});
