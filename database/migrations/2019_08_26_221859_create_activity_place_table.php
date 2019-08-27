<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_place', function (Blueprint $table) {
            $table->bigIncrements('id_activity_place');

            $table->bigInteger('place_id')->unsigned();
            $table->bigInteger('activity_id')->unsigned();

            $table->timestamps();

            //relation
            $table->foreign('place_id')->references('id_place')->on('places');
            $table->foreign('activity_id')->references('id_activity')->on('activities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_place');
    }
}
