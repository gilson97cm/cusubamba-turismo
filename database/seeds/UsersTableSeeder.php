<?php

use App\RoleUser;
use Illuminate\Database\Seeder;
use \Caffeinated\Shinobi\Models\Role;
use App\User;
use \Illuminate\Support\Facades\Crypt;
use \Illuminate\Support\Facades\Hash;

class
UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(\App\User::class,20)->create();
        //crear usuario
        User::create([
            'person_id_card' => '0440565993',
            'email' => 'admin@live.com',
            'password' => Hash::make('123456789'),
            'state_user' => 'Activo',
        ]);


        //crear rol
        Role::create([
            'name' => 'No Asignado',
            'slug' => 'roles.sistema',
            'special' => 'no-access',
        ]);
        Role::create([
            'name' => 'Administrador',
            'slug' => 'admin',
            'special' => 'all-access',
        ]);

        //asignar rol a usuario
        RoleUser::create([
            'role_id' => 2,
            'user_id' => 1,
        ]);

    }
}
