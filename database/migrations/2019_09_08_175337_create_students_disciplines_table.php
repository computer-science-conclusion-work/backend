<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_disciplines', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_student')->unsigned();
            $table->foreign('id_student')->references('id')->on('students');

            $table->integer('id_discipline')->unsigned();
            $table->foreign('id_discipline')->references('id')->on('disciplines');

            $table->string('year_semester')->nullable();
            $table->integer('note')->unsigned()->nullable();
            $table->integer('workload')->unsigned()->nullable();
            $table->integer('credits')->unsigned()->nullable();

            $table->timestamps();

            $table->unique(['id_student', 'id_discipline', 'year_semester'], 'students_disciplines_semester_index_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_disciplines');
    }
}
