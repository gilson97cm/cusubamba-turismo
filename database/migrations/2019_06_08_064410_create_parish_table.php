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
            $table->bigIncrements('id');
            $table->string('name_parish');
           // $table->primary('name_parish');
            $table->bigInteger('canton_id')->unsigned();
            $table->timestamps();

            //relation
             $table->foreign('canton_id')->references('id')->on('canton');
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
