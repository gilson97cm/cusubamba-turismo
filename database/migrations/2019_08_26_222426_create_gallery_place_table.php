<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryPlaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery_place', function (Blueprint $table) {
            $table->bigIncrements('id_gallery_place');

            $table->bigInteger('place_id')->unsigned();
            $table->bigInteger('picture_id')->unsigned();
            $table->timestamps();

            //relation
            $table->foreign('place_id')->references('id')->on('places')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('gallery_place');
    }
}
