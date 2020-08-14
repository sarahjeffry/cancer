<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\StatDoses::class, function (Faker $faker) {

    return [
        'patient_id' => factory('App\Patient')->create(),
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'drug_name' => $faker->randomElement($array = array ('Paracetamol','Ibuprofen','Hydrocodone')),
        'dose_value' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 5, $max = 25),
        'dose_unit' => $faker->randomElement($array = array ('mcg','mg','g','ml')),
    ];
});

//'staff_id' => factory('App\User')->create()->staff_id,

//'mrn','date', 'time', 'name', 'dose_value', 'dose_unit'
