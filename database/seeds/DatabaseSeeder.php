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
//        factory(App\User::class, 10)->create()->each(function ($user){
//            $user->patients()->save(factory(App\Patient::class)->make());
//
//        });
        factory(App\User::class, 10)->create();
        factory(App\Patient::class, 100)->create();
        // $this->call(UserSeeder::class);
    }
}
