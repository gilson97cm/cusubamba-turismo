<?php

use App\PlaceCategories;
use Illuminate\Database\Seeder;

class PlaceCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlaceCategories::create([
            'name_place_category' => 'DESTINOS CULTURALES',
            'description_place_category' => 'destinos culturales',
        ]);
        PlaceCategories::create([
            'name_place_category' => 'CASAS PATRIMONIALES',
            'description_place_category' => 'casas patrimoniales',
        ]);
        PlaceCategories::create([
            'name_place_category' => 'HACIENDAS',
            'description_place_category' => 'haciendas',
        ]);
    }
}
