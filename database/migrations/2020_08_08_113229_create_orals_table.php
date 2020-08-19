<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('drug_name')->nullable();
            $table->float('dose_value')->nullable();
            $table->string('dose_unit')->nullable();
            $table->string('frequency')->nullable();
            $table->string('duration')->nullable();
            $table->string('prescribed_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orals');
    }
}
