<?php

use Illuminate\Database\Seeder;
use \App\Address\Province;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Province::create([
            'name_province' => 'CARCHI',
        ]);
        Province::create([
            'name_province' => 'COTOPAXI',
        ]);
    }
}
