<?php

use App\ActivityCategories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ActivityCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ActivityCategories::create([
            'name_activity_category' => 'DEPORITIVAS',
            'description_activity_category' => 'actividades deportivas',
        ]);
        ActivityCategories::create([
            'name_activity_category' => 'TRADICIONALES',
            'description_activity_category' => 'Actividades tradicionales',
        ]);
        ActivityCategories::create([
            'name_activity_category' => 'GASTRONOMICAS',
            'description_activity_category' => 'actividades gastronomicas',
        ]);
    }
}
