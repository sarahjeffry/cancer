<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment_views', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        DB::statement("CREATE VIEW companiesView AS
                        SELECT *,
                        (
                            SELECT GROUP_CONCAT(DISTINCT id SEPARATOR ',')
                            FROM people AS p
                            WHERE p.company_id = c.id
                        ) AS person_ids
                        FROM companies AS c");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatment_views');
    }
}
