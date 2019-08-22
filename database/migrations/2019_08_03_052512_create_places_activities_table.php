<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places_activities', function (Blueprint $table) {
            $table->bigIncrements('id_place_activity');

            $table->bigInteger('place_id')->unsigned();
            $table->foreign('place_id')->references('id_place')->on('places');

            $table->bigInteger('activity_id')->unsigned();
            $table->foreign('activity_id')->references('id_activity')->on('activities');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places_activities');
    }
}
