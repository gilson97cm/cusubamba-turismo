<?php

use Illuminate\Database\Seeder;
use \App\Address\Canton;

class CantonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #region CARCHI
        Canton::create([
            'name_canton' => 'BOLÍVAR', //CARCHI
            'name_province' => 'CARCHI',
        ]);
        Canton::create([
            'name_canton' => 'TULCÁN',
            'name_province' => 'CARCHI',
        ]);

        #endregion

        #region  COTOPAXI
        Canton::create([
            'name_canton' => 'LATACUNGA', //COTOPAXI
            'name_province' => 'COTOPAXI',
        ]);
        Canton::create([
            'name_canton' => 'LA MANÁ',
            'name_province' => 'COTOPAXI',
        ]);
        Canton::create([
            'name_canton' => 'PANGUA',
            'name_province' => 'COTOPAXI',
        ]);
        Canton::create([
            'name_canton' => 'PUJILI',
            'name_province' => 'COTOPAXI',
        ]);
        Canton::create([
            'name_canton' => 'SALCEDO',
            'name_province' => 'COTOPAXI',
        ]);
        Canton::create([
            'name_canton' => 'SAQUISILÍ',
            'name_province' => 'COTOPAXI',
        ]);
        Canton::create([
            'name_canton' => 'SIGCHOS',
            'name_province' => 'COTOPAXI',
        ]);
        #endregion
    }
}
