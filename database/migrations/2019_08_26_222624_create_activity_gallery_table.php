<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_gallery', function (Blueprint $table) {
            $table->bigIncrements('id_activity_gallery');

            $table->bigInteger('activity_id')->unsigned();
            $table->bigInteger('picture_id')->unsigned();

            $table->timestamps();

            //relation
            $table->foreign('activity_id')->references('id')->on('activities')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('picture_id')->references('id_picture')->on('pictures')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_gallery');
    }
}
