<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use PSP\profilegenerator\src\Models\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'postalcode'=> $faker->postcode,
        'gender' => $faker->randomElement(['M','F']),        
    ];
});
