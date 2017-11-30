<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password = '123456';

    return [
        'name' => $faker->name,
        'username' => $faker->unique()->username,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ? bcrypt($password) : bcrypt('secret'),
        'age' => $faker->randomDigit,
        'phone' => $faker->phoneNumber,
        'remember_token' => str_random(60),
        'verify_token' => str_random(60)
    ];
});
