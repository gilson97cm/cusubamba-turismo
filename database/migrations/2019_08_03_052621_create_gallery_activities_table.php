<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_activities', function (Blueprint $table) {
            $table->bigIncrements('id_gallery_activity');

            $table->bigInteger('activity_id')->unsigned();
            $table->foreign('activity_id')->references('id_activity')->on('activities')->onUpdate('cascade')->onDelete('cascade');

            $table->bigInteger('picture_id')->unsigned();
            $table->foreign('picture_id')->references('id_picture')->on('pictures')->onUpdate('cascade')->onDelete('cascade');


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
        Schema::dropIfExists('gallery_activities');
    }
}
