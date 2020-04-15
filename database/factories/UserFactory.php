<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'firstname' => $faker->name,
        'middlename' => $faker->lastName,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => 'cms_password123', // password
        'remember_token' => Str::random(10),
    ];
});
