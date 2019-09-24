<?php

use Illuminate\Database\Seeder;
use \App\Address\Parish;

class ParishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #region LATACUNGA
        Parish::create([
            'name_parish' => 'ELOY ALFARO (SAN FELIPE)',
            'canton_id' => '3',
        ]);
        Parish::create([
            'name_parish' => 'IGNACIO FLORES (PARQUE FLORES)',
            'canton_id' => '3',
        ]);
        Parish::create([
            'name_parish' => 'JUAN MONTALVO (SAN SEBASTIÁN)',
            'canton_id' => '3',
        ]);
        Parish::create([
            'name_parish' => 'LA MATRIZ',
            'canton_id' => '3',
        ]);
        Parish::create([
            'name_parish' => 'SAN BUENAVENTURA',
            'canton_id' => '3',
        ]);
        Parish::create([
            'name_parish' => 'LATACUNGA',
            'canton_id' => '3',
        ]);
        Parish::create([
            'name_parish' => 'ALAQUES (ALÁQUEZ)',
            'canton_id' => '3',
        ]);
        Parish::create([
            'name_parish' => 'BELISARIO QUEVEDO (GUANAILÍN)',
            'canton_id' => '3',
        ]);
        Parish::create([
            'name_parish' => 'GUAITACAMA (GUAYTACAMA)',
            'canton_id' => '3',
        ]);
        Parish::create([
            'name_parish' => 'JOSEGUANGO BAJO',
            'canton_id' => '3',
        ]);
        Parish::create([
            'name_parish' => 'LAS PAMPAS - LATACUNGA',
            'canton_id' => '3',
        ]);
        Parish::create([
            'name_parish' => 'MULALÓ',
            'canton_id' => '3',
        ]);
        Parish::create([
            'name_parish' => '11 DE NOVIEMBRE (ILINCHISI)',
            'canton_id' => '3',
        ]);
        Parish::create([
            'name_parish' => 'POALÓ',
            'canton_id' => '3',
        ]);
        Parish::create([
            'name_parish' => 'SAN JUAN DE PASTOCALLE',
            'canton_id' => '3',
        ]);
        Parish::create([
            'name_parish' => 'TANICUCHÍ',
            'canton_id' => '3',
        ]);
        Parish::create([
            'name_parish' => 'TOACASO',
            'canton_id' => '3',
        ]);
        #endregion

        #region LA MANÁ
        Parish::create([
            'name_parish' => 'EL CARMEN',
            'canton_id' => '4',
        ]);
        Parish::create([
            'name_parish' => 'LA MANÁ',
            'canton_id' => '4',
        ]);
        Parish::create([
            'name_parish' => 'EL TRIUNFO',
            'canton_id' => '4',
        ]);
        Parish::create([
            'name_parish' => 'GUASAGANDA (CAB.EN GUASAGANDA',
            'canton_id' => '4',
        ]);
        Parish::create([
            'name_parish' => 'PUCAYACU',
            'canton_id' => '4',
        ]);
        #endregion

        #region PANGUA
        Parish::create([
            'name_parish' => 'EL CORAZÓN',
            'canton_id' => '5',
        ]);
        Parish::create([
            'name_parish' => 'MORASPUNGO',
            'canton_id' => '5',
        ]);
        Parish::create([
            'name_parish' => 'PINLLOPATA',
            'canton_id' => '5',
        ]);
        Parish::create([
            'name_parish' => 'RAMÓN CAMPAÑA',
            'canton_id' => '5',
        ]);
        #endregion

        #region PUJILI
        Parish::create([
            'name_parish' => 'PUJILÍ',
            'canton_id' => '6',
        ]);
        Parish::create([
            'name_parish' => 'ANGAMARCA',
            'canton_id' => '6',
        ]);
        Parish::create([
            'name_parish' => 'CHUCCHILÁN (CHUGCHILÁN) - PUJILI',
            'canton_id' => '6',
        ]);
        Parish::create([
            'name_parish' => 'GUANGAJE',
            'canton_id' => '6',
        ]);
        Parish::create([
            'name_parish' => 'ISINLIBÍ (ISINLIVÍ)',
            'canton_id' => '6',
        ]);
        Parish::create([
            'name_parish' => 'LA VICTORIA',
            'canton_id' => '6',
        ]);
        Parish::create([
            'name_parish' => 'PILALÓ',
            'canton_id' => '6',
        ]);
        Parish::create([
            'name_parish' => 'TINGO',
            'canton_id' => '6',
        ]);
        Parish::create([
            'name_parish' => 'ZUMBAHUA',
            'canton_id' => '6',
        ]);

        #endregion

        #region SALCEDO
        Parish::create([
            'name_parish' => 'SAN MIGUEL',
            'canton_id' => '7',
        ]);
        Parish::create([
            'name_parish' => 'ANTONIO JOSÉ HOLGUÍN (SANTA LUCÍA)',
            'canton_id' => '7',
        ]);
        Parish::create([
            'name_parish' => 'CUSUBAMBA',
            'canton_id' => '7',
        ]);
        Parish::create([
            'name_parish' => 'MULALILLO',
            'canton_id' => '7',
        ]);
        Parish::create([
            'name_parish' => 'MULLIQUINDIL (SANTA ANA)',
            'canton_id' => '7',
        ]);
        Parish::create([
            'name_parish' => 'PANSALEO',
            'canton_id' => '7',
        ]);
        #endregion

        #region SAQUISILÍ
        Parish::create([
            'name_parish' => 'SAQUISILÍ',
            'canton_id' => '8',
        ]);
        Parish::create([
            'name_parish' => 'CANCHAGUA',
            'canton_id' => '8',
        ]);
        Parish::create([
            'name_parish' => 'CHANTILÍN',
            'canton_id' => '8',
        ]);
        Parish::create([
            'name_parish' => 'COCHAPAMBA',
            'canton_id' => '8',
        ]);
        #endregion

        #region SIGCHOS
        Parish::create([
            'name_parish' => 'SIGCHOS',
            'canton_id' => '9',
        ]);
        Parish::create([
            'name_parish' => 'CHUGCHILLÁN - SIGCHOS',
            'canton_id' => '9',
        ]);
        Parish::create([
            'name_parish' => 'ISINLIVÍ',
            'canton_id' => '9',
        ]);
        Parish::create([
            'name_parish' => 'LAS PAMPAS - SIGCHOS',
            'canton_id' => '9',
        ]);
        Parish::create([
            'name_parish' => 'PALO QUEMADO',
            'canton_id' => '9',
        ]);
        #endregion

    }
}
