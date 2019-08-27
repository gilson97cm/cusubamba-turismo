<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parish', function (Blueprint $table) {
           // $table->bigIncrements('id');
            $table->string('name_parish');
            $table->primary('name_parish');
            $table->string('name_canton');
            $table->timestamps();

            //relation
             $table->foreign('name_canton')->references('name_canton')->on('canton');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parish');
    }
}
