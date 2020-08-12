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
        factory('App\User', 10)->create();
        factory('App\Patient', 225)->create();
//        factory('App\User', 5)->create()->each(function($user){
//            $user->patients()->save(factory('App\Patient')->make());
//        });

    }
}
