<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_activity')->unique();
            $table->text('description_activity');
            $table->string('avatar_activity')->nullable();
            $table->bigInteger('activity_categories_id')->unsigned();
            $table->timestamps();

            //relation
            $table->foreign('activity_categories_id')->references('id')->on('activity_categories')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
