<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Operation::class, function (Faker $faker) {

    return [
        'patient_id' => factory('App\Patient')->create(),
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'operation' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'diagnosis' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'shaving' => $faker->randomElement($array = array ('yes','no')),
        'anaesthetist' => $faker->randomElement($array = array ('spinal','local','general','sedation', 'epidural')),
        'diet' => $faker->randomElement($array = array ('normal','diabetic','low salt')),
        'prescribed_by' =>  factory('App\User')->create()
    ];
});

//'id','patient_id','date', 'time', 'operation', 'diagnosis', 'shaving','anaesthetist','diet'
