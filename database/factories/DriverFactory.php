<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Driver;
use Faker\Generator as Faker;

$factory->define(Driver::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => $faker->password,
        'gender' => $faker->randomElement($array = array ('male','female')),
        'phone_number' => $faker->e164PhoneNumber
    ];
});
