<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model\Driver;
use App\Model\Location;
use Faker\Generator as Faker;

$factory->define(Driver::class, function (Faker $faker) {
    return [
    	'location_id' => function() {
            return Location::all()->random();
        },
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => $faker->password,
        'gender' => $faker->randomElement($array = array ('male','female')),
        'phone_number' => $faker->e164PhoneNumber,
        'home_address' => $faker->address,
        'bvn' => $faker->numerify('##########'),
        'drivers_license' => $faker->bothify('/???/??/???.png'),
        'account_type' => $faker->randomElement($array = array ('savings','current', 'others')),
        'account_number' => $faker->numerify('##########'),
        'account_name' => $faker->name,
        'bank' => $faker->word
    ];
});
