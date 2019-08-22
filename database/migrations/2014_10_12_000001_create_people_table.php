<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->Increments('id_person')->unique();
            $table->string('id_card_person',10)->unique(); //clave primaria
            //$table->primary('id_card_person');
            $table->string('name_person');
            $table->string(('last_name_person'));
            $table->date('birthdate_person')->nullable();
            $table->string('province_person')->nullable();
            $table->string('canton_person')->nullable();
            $table->string('parish_person')->nullable();
            $table->string('address_person')->nullable();
            $table->string('phone_person')->nullable();
            $table->enum('genre_person',['Masculino','Femenino','Otro'])->nullable();
            $table->string('position_person');
          //  $table->enum('state_person',['Activo','Inactivo']);
           // $table->primary(['id_person', 'id_card_person']);
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
        Schema::dropIfExists('people');
    }
}
