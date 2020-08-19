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
        Schema::create('stat_doses', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
//            $table->string('patient_id')->unique();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('drug_name')->nullable();
            $table->float('dose_value')->nullable();
            $table->string('dose_unit')->nullable();
            $table->string('prescribed_by')->nullable();
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
        Schema::dropIfExists('stat_doses');
    }
}
