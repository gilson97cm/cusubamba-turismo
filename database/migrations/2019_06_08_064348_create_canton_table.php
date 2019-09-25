<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCantonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('canton', function (Blueprint $table) {
           // $table->bigIncrements('id');
            $table->string('name_canton');
           $table->primary('name_canton');
            $table->string('name_province');
            $table->timestamps();

            //relation
            $table->foreign('name_province')->references('name_province')->on('province');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('canton');
    }
}
