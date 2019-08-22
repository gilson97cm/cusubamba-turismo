<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_places', function (Blueprint $table) {
            $table->bigIncrements('id_gallery_place');

            $table->bigInteger('place_id')->unsigned();
            $table->foreign('place_id')->references('id_place')->on('places')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('gallery_places');
    }
}
