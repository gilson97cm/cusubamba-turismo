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
            $table->bigIncrements('id');

            $table->bigInteger('place_id')->unsigned();
            $table->bigInteger('activity_id')->unsigned();

            $table->timestamps();

            //relation
            $table->foreign('place_id')->references('id')->on('places')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('activity_id')->references('id')->on('activities')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
