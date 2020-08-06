<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatdosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statdoses', function (Blueprint $table) {
            $table->id();
//            $table->foreign('id')->references('id')->on('patients');
            $table->timestamps();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('name')->nullable();
            $table->float('dose_value')->nullable();
            $table->string('dose_unit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statdoses');
    }
}
