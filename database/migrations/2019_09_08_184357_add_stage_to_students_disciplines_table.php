<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStageToStudentsDisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students_disciplines', function (Blueprint $table) {
            $table->integer('id_stage')->unsigned();
            $table->foreign('id_stage')->references('id')->on('stages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students_disciplines', function (Blueprint $table) {
            $table->dropForeign(['id_stage']);
        });
    }
}
