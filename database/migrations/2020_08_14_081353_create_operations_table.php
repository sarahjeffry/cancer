<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->longText('operation')->nullable();
            $table->longText('diagnosis')->nullable();
            $table->string('shaving')->nullable();
            $table->string('anaesthetist')->nullable();
            $table->string('diet')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operations');
    }
}
