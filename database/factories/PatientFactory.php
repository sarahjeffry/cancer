<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Patient::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'gender' => $faker->randomElement($array = array ('male','female')),
        'patient_id' => $faker->unique()->bothify('?KSN?###'),
        'type' => $faker->randomElement($array = array ('breast', 'lung','skin', 'pancreas')),
        'height' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1.49, $max = 1.87),
        'weight' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 45.3, $max = 80.4),
        'smoking' => $faker->randomElement($array = array ('no','yes')),
        'status' => $faker->randomElement($array = array ('yes','no')),
        'live' => $faker->randomElement($array = array ('alive','deceased')),
        'staff_id' => factory('App\User')->create()->staff_id,
        'user_id' => $faker->unique()->bothify('?PKS?###'),
        'year' => $faker->randomElement($array = array (2015,2016,2017,2018,2019,2020)),
    ];
});
