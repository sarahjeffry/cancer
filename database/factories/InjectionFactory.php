<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Injection::class, function (Faker $faker) {

    return [
        'patient_id' => factory('App\Patient')->create(),
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'route' => $faker->randomElement($array = array ('IV','PO','IM','S/C')),
        'drug_name' => $faker->randomElement($array = array ('Doxorubicin','Cyclophosphamide')),
        'dose_value' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 5, $max = 15),
        'dose_unit' => $faker->randomElement($array = array ('mcg','mg','g','ml')),
        'prescribed_by' =>  factory('App\User')->create()
    ];
});
