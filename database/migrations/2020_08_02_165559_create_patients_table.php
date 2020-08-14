<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('gender');
            $table->string('patient_id')->unique();
            $table->string('staff_id');
            $table->string('type');
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->float('bmi')->nullable();
            $table->string('smoking');
            $table->string('status');
            $table->string('live');
            $table->string('user_id')->unique(); //Tak tahulah kenapa kena ada column ni, tapi kalau tak letak jadi error
            $table->integer('year');
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
        Schema::dropIfExists('patients');
    }
}
