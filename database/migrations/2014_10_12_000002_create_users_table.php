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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); //clave primaria
            //datos de la persona
            $table->string('id_card_user',10)->unique(); //cedula
            $table->string('name_user');
            $table->string('last_name_user');
            $table->date('birth_date_user')->nullable();
            $table->string('phone_user')->nullable();
            $table->enum('genre_user',['Masculino','Femenino','Otro'])->nullable();
            $table->string('position_user');

            //direccion
            $table->string('province_user')->nullable();
            $table->string('canton_user')->nullable();
            $table->string('parish_user')->nullable();
            $table->string('address_user')->nullable();

            //credenciales de acceso al sistema

           $table->string('email')->unique();
            $table->string('password');
            $table->enum('state_user',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->string('avatar_user')->nullable();


            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
