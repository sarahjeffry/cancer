<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @param $faker
     * @return void
     */
    public function up($faker)
    {
        Schema::create('users', function (Blueprint $table) use ($faker) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('staff_id')->nullable()->unique();
            $table->text('img_profile')->nullable();
            $table->string('img_profile')-> $faker->imageUrl('125', '125');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
