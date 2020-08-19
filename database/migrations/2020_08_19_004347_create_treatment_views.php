<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

//        DB::statement("
//            CREATE VIEW treatment
//            AS
//            SELECT
//                stat_doses.id,
//                employees.emp_no,
//                employees.first_name,
//                employees.last_name,
//                employees.gender,
//                employees.hire_date,
//                employees.birth_date,
//                dept_emp.dept_no,
//                departments.dept_name,
//                mananger.emp_no AS manager_emp_no,
//                mananger.first_name AS manager_first_name,
//                mananger.last_name AS manager_last_name
//            FROM
//                employees
//                LEFT JOIN dept_emp ON employees.emp_no = dept_emp.emp_no
//                LEFT JOIN departments ON dept_emp.dept_no = departments.dept_no
//                LEFT JOIN dept_manager ON departments.dept_no = dept_manager.dept_no
//                LEFT JOIN employees mananger ON dept_manager.emp_no = mananger.emp_no;
//        ");
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
