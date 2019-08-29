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
            $table->bigIncrements('id_activity');
            $table->string('name_activity')->unique();
            $table->text('description_activity');
            $table->string('avatar_activity');

            $table->bigInteger('category_activity_id')->unsigned();
            $table->timestamps();

            //relation
            $table->foreign('category_activity_id')->references('id')->on('category_activities');

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
