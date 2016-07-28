<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursScenariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours_scenario', function (Blueprint $table) {
            $table->integer('scenario_id')->unsigned();
            $table->foreign('scenario_id')->references('id')->on('scenarios');
            $table->integer('cours_id')->unsigned();
            $table->foreign('cours_id')->references('id')->on('cours');
            $table->boolean('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cours_scenario');
    }
}
