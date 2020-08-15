<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User', 5)->create();
        factory('App\Patient', 200)->create();
        factory('App\StatDoses', 30)->create();
        factory('App\Oral', 30)->create();
        factory('App\Infusion', 30)->create();
        factory('App\Inhalation', 30)->create();
        factory('App\Premedication', 30)->create();
        factory('App\Injection', 30)->create();
        factory('App\Operation', 30)->create();
//        factory('App\Chart', 30)->create();

//        factory('App\User', 5)->create()->each(function($user){
//            $user->patients()->save(factory('App\Patient')->make());
//        });

    }
}
