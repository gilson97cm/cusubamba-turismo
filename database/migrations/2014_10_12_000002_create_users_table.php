<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });*/
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('person_id_card', 10);
           $table->string('email')->unique();
            $table->string('password');
            $table->enum('state_user',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->rememberToken();
            $table->timestamps();

            //Relation
            $table->foreign('person_id_card')->references('id_card_person')->on('people')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
