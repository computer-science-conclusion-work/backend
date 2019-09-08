<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquivalenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equivalencies', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_student_discipline_a')->unsigned();
            $table->foreign('id_student_discipline_a')->references('id')->on('students_disciplines');

            $table->integer('id_student_discipline_b')->unsigned();
            $table->foreign('id_student_discipline_b')->references('id')->on('students_disciplines');

            $table->timestamps();

            $table->unique(['id_student_discipline_a', 'id_student_discipline_b'], 'student_discipline_student_discipline_index_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equivalencies');
    }
}
