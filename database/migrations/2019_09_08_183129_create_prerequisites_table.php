<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrerequisitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prerequisites', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('id_discipline_a')->unsigned();
            $table->foreign('id_discipline_a')->references('id')->on('disciplines');

            $table->integer('id_discipline_b')->unsigned();
            $table->foreign('id_discipline_b')->references('id')->on('disciplines');

            $table->timestamps();

            $table->unique(['id_discipline_a', 'id_discipline_b'], 'discipline_discipline_prerequisites_index_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prerequisites');
    }
}
