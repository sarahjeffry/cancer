<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->string('treatment')->nullable();
            $table->string('iv_infusion')->nullable();
            $table->string('diet')->nullable();
            $table->string('chart_img')->nullable();
            $table->string('prescribed_by')->nullable();
        });
    }
//'id','patient_id','treatment', 'iv_infusion', 'diet', 'chart_img'
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charts');
    }
}
