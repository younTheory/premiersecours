<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatistiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistiques', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('scenario_id')->unsigned();
            $table->foreign('scenario_id')->references('id')->on('scenarios');
            $table->integer('cours_id')->unsigned();
            $table->foreign('cours_id')->references('id')->on('cours');
            $table->integer('score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('statistiques');
    }
}
