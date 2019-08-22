<?php

use App\Person;
use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::create([
            'id_card_person' => '0440565993',
            'name_person' => 'Pedro Pablo',
            'last_name_person' =>'Paramo',
            'birthdate_person' => '1997/02/04',
            'province_person' => 'COTOPAXI',
            'canton_person' => 'LATACUNGA',
            'parish_person' => 'LA MATRIZ',
            'address_person' => 'Calle 123456',
            'phone_person' => '0983440792',
            'genre_person' => 'Masculino',
            'position_person' => 'Presidente',
        ]);
      /*  Person::create([
            'id_card_person' => '1724636297',
            'name_person' => 'Pedro Pablo',
            'last_name_person' =>'Iza',
            'birthdate_person' => '1996/03/14',
            'province_person' => 'COTOPAXI',
            'canton_person' => 'LATACUNGA',
            'parish_person' => 'LA MATRIZ',
            'address_person' => 'Calle 1234567',
            'phone_person' => '0983440792',
            'genre_person' => 'Masculino',
            'state_person' => 'Activo',
        ]);*/
    }
}
