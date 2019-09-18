<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name_event');
            $table->mediumText('description_event')->nullable();
            $table->string('location_event')->nullable();
            $table->datetime('start_event');
            $table->datetime('end_event')->nullable();
            $table->boolean('all_day_event');
            $table->string('color_event')->nullable();
            $table->string('avatar_event')->nullable();
            $table->bigInteger('event_category_id')->unsigned()->nullable();
            $table->timestamps();

            //relations
            $table->foreign('event_category_id')->references('id')->on('event_categories')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
