<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Chart::class, function (Faker $faker) {

    return [
        'patient_id' => factory('App\Patient')->create(),
        'treatment' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'iv_infusion' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'diet' => $faker->randomElement($array = array ('normal','diabetic','low salt')),
        'chart_img' => $faker->$faker->imageUrl('700', '700'),
    ];
});


//'id','patient_id','treatment', 'iv_infusion', 'diet', 'chart_img'
