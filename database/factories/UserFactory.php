<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'role' => $faker->randomElement($array = array ('nurse','consultant')),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\Patient::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'gender' => $faker->randomElement($array = array ('male','female')),
        'mrn' => $faker->unique()->bothify('?KSN?###'),
        'type' => $faker->randomElement($array = array ('breast', 'lung','skin', 'pancreas')),
        'height' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1.49, $max = 1.87),
        'weight' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 45.3, $max = 80.4),
        'smoking' => $faker->randomElement($array = array ('no','yes')),
        'status' => $faker->randomElement($array = array ('yes','no')),
        'live' => $faker->randomElement($array = array ('alive','deceased')),
        'year' => $faker->randomElement($array = array (2015,2016,2017,2018,2019,2020)),
    ];
});
