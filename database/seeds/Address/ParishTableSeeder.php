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
            'name_canton' => 'LATACUNGA',
        ]);
        Parish::create([
            'name_parish' => 'IGNACIO FLORES (PARQUE FLORES)',
            'name_canton' => 'LATACUNGA',
        ]);
        Parish::create([
            'name_parish' => 'JUAN MONTALVO (SAN SEBASTIÁN)',
            'name_canton' => 'LATACUNGA',
        ]);
        Parish::create([
            'name_parish' => 'LA MATRIZ',
            'name_canton' => 'LATACUNGA',
        ]);
        Parish::create([
            'name_parish' => 'SAN BUENAVENTURA',
            'name_canton' => 'LATACUNGA',
        ]);
        Parish::create([
            'name_parish' => 'LATACUNGA',
            'name_canton' => 'LATACUNGA',
        ]);
        Parish::create([
            'name_parish' => 'ALAQUES (ALÁQUEZ)',
            'name_canton' => 'LATACUNGA',
        ]);
        Parish::create([
            'name_parish' => 'BELISARIO QUEVEDO (GUANAILÍN)',
            'name_canton' => 'LATACUNGA',
        ]);
        Parish::create([
            'name_parish' => 'GUAITACAMA (GUAYTACAMA)',
            'name_canton' => 'LATACUNGA',
        ]);
        Parish::create([
            'name_parish' => 'JOSEGUANGO BAJO',
            'name_canton' => 'LATACUNGA',
        ]);
        Parish::create([
            'name_parish' => 'LAS PAMPAS - LATACUNGA',
            'name_canton' => 'LATACUNGA',
        ]);
        Parish::create([
            'name_parish' => 'MULALÓ',
            'name_canton' => 'LATACUNGA',
        ]);
        Parish::create([
            'name_parish' => '11 DE NOVIEMBRE (ILINCHISI)',
            'name_canton' => 'LATACUNGA',
        ]);
        Parish::create([
            'name_parish' => 'POALÓ',
            'name_canton' => 'LATACUNGA',
        ]);
        Parish::create([
            'name_parish' => 'SAN JUAN DE PASTOCALLE',
            'name_canton' => 'LATACUNGA',
        ]);
        Parish::create([
            'name_parish' => 'TANICUCHÍ',
            'name_canton' => 'LATACUNGA',
        ]);
        Parish::create([
            'name_parish' => 'TOACASO',
            'name_canton' => 'LATACUNGA',
        ]);
        #endregion

        #region LA MANÁ
        Parish::create([
            'name_parish' => 'EL CARMEN',
            'name_canton' => 'LA MANÁ',
        ]);
        Parish::create([
            'name_parish' => 'LA MANÁ',
            'name_canton' => 'LA MANÁ',
        ]);
        Parish::create([
            'name_parish' => 'EL TRIUNFO',
            'name_canton' => 'LA MANÁ',
        ]);
        Parish::create([
            'name_parish' => 'GUASAGANDA (CAB.EN GUASAGANDA',
            'name_canton' => 'LA MANÁ',
        ]);
        Parish::create([
            'name_parish' => 'PUCAYACU',
            'name_canton' => 'LA MANÁ',
        ]);
        #endregion

        #region PANGUA
        Parish::create([
            'name_parish' => 'EL CORAZÓN',
            'name_canton' => 'PANGUA',
        ]);
        Parish::create([
            'name_parish' => 'MORASPUNGO',
            'name_canton' => 'PANGUA',
        ]);
        Parish::create([
            'name_parish' => 'PINLLOPATA',
            'name_canton' => 'PANGUA',
        ]);
        Parish::create([
            'name_parish' => 'RAMÓN CAMPAÑA',
            'name_canton' => 'PANGUA',
        ]);
        #endregion

        #region PUJILI
        Parish::create([
            'name_parish' => 'PUJILÍ',
            'name_canton' => 'PUJILI',
        ]);
        Parish::create([
            'name_parish' => 'ANGAMARCA',
            'name_canton' => 'PUJILI',
        ]);
        Parish::create([
            'name_parish' => 'CHUCCHILÁN (CHUGCHILÁN) - PUJILI',
            'name_canton' => 'PUJILI',
        ]);
        Parish::create([
            'name_parish' => 'GUANGAJE',
            'name_canton' => 'PUJILI',
        ]);
        Parish::create([
            'name_parish' => 'ISINLIBÍ (ISINLIVÍ)',
            'name_canton' => 'PUJILI',
        ]);
        Parish::create([
            'name_parish' => 'LA VICTORIA',
            'name_canton' => 'PUJILI',
        ]);
        Parish::create([
            'name_parish' => 'PILALÓ',
            'name_canton' => 'PUJILI',
        ]);
        Parish::create([
            'name_parish' => 'TINGO',
            'name_canton' => 'PUJILI',
        ]);
        Parish::create([
            'name_parish' => 'ZUMBAHUA',
            'name_canton' => 'PUJILI',
        ]);

        #endregion

        #region SALCEDO
        Parish::create([
            'name_parish' => 'SAN MIGUEL',
            'name_canton' => 'SALCEDO',
        ]);
        Parish::create([
            'name_parish' => 'ANTONIO JOSÉ HOLGUÍN (SANTA LUCÍA)',
            'name_canton' => 'SALCEDO',
        ]);
        Parish::create([
            'name_parish' => 'CUSUBAMBA',
            'name_canton' => 'SALCEDO',
        ]);
        Parish::create([
            'name_parish' => 'MULALILLO',
            'name_canton' => 'SALCEDO',
        ]);
        Parish::create([
            'name_parish' => 'MULLIQUINDIL (SANTA ANA)',
            'name_canton' => 'SALCEDO',
        ]);
        Parish::create([
            'name_parish' => 'PANSALEO',
            'name_canton' => 'SALCEDO',
        ]);
        #endregion

        #region SAQUISILÍ
        Parish::create([
            'name_parish' => 'SAQUISILÍ',
            'name_canton' => 'SAQUISILÍ',
        ]);
        Parish::create([
            'name_parish' => 'CANCHAGUA',
            'name_canton' => 'SAQUISILÍ',
        ]);
        Parish::create([
            'name_parish' => 'CHANTILÍN',
            'name_canton' => 'SAQUISILÍ',
        ]);
        Parish::create([
            'name_parish' => 'COCHAPAMBA',
            'name_canton' => 'SAQUISILÍ',
        ]);
        #endregion

        #region SIGCHOS
        Parish::create([
            'name_parish' => 'SIGCHOS',
            'name_canton' => 'SIGCHOS',
        ]);
        Parish::create([
            'name_parish' => 'CHUGCHILLÁN - SIGCHOS',
            'name_canton' => 'SIGCHOS',
        ]);
        Parish::create([
            'name_parish' => 'ISINLIVÍ',
            'name_canton' => 'SIGCHOS',
        ]);
        Parish::create([
            'name_parish' => 'LAS PAMPAS - SIGCHOS',
            'name_canton' => 'SIGCHOS',
        ]);
        Parish::create([
            'name_parish' => 'PALO QUEMADO',
            'name_canton' => 'SIGCHOS',
        ]);
        #endregion

    }
}
