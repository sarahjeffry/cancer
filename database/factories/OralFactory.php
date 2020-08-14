<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Oral::class, function (Faker $faker) {

    return [
        'patient_id' => factory('App\Patient')->create(),
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'drug_name' => $faker->randomElement($array = array ('T. Xeloda','Capecitabine','Cytotoxic')),
        'dose_value' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 5, $max = 25),
        'dose_unit' => $faker->randomElement($array = array ('mcg','mg','g','ml')),
        'frequency' => $faker->randomElement($array = array ('Once','Twice','8 hours')),
        'duration' => $faker->randomElement($array = array ('Daily','Weekly','Two Weeks','If necessary')),
    ];
});

//'id','patient_id','date', 'time', 'drug_name', 'dose_value', 'dose_unit','frequency','duration'
