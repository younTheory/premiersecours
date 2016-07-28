<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEtapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etapes', function (Blueprint $table) {
            $table->increments('id');
            $table->mediumText('text');
            $table->mediumText('reponse_positive');
            $table->mediumText('reponse_negative');
            $table->integer('points');
            $table->integer('scenario_id')->unsigned();
            $table->foreign('scenario_id')->references('id')->on('scenarios');
            $table->integer('reponse_id')->unsigned();
            $table->foreign('reponse_id')->references('id')->on('reponses');
            $table->integer('no_etape')->unsigned();
            $table->integer('types_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('etapes');
    }
}
