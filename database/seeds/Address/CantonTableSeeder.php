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
            'name_canton' => 'BOLÍVAR',
            'province_id' => '1',
        ]);
        Canton::create([
            'name_canton' => 'TULCÁN',
            'province_id' => '1',
        ]);

        #endregion

        #region  COTOPAXI
        Canton::create([
            'name_canton' => 'LATACUNGA',
            'province_id' => '2',
        ]);
        Canton::create([
            'name_canton' => 'LA MANÁ',
            'province_id' => '2',
        ]);
        Canton::create([
            'name_canton' => 'PANGUA',
            'province_id' => '2',
        ]);
        Canton::create([
            'name_canton' => 'PUJILI',
            'province_id' => '2',
        ]);
        Canton::create([
            'name_canton' => 'SALCEDO',
            'province_id' => '2',
        ]);
        Canton::create([
            'name_canton' => 'SAQUISILÍ',
            'province_id' => '2',
        ]);
        Canton::create([
            'name_canton' => 'SIGCHOS',
            'province_id' => '2',
        ]);
        #endregion
    }
}
