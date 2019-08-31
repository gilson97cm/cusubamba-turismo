<?php

use App\EventCategories;
use Illuminate\Database\Seeder;

class EventCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventCategories::create([
            'name_event_category' => 'CULTURALES',
            'description_event_category' => 'eventos culturales',
        ]);
        EventCategories::create([
            'name_event_category' => 'RELIGIOSOS',
            'description_event_category' => 'eventos religioso',
        ]);
        EventCategories::create([
            'name_event_category' => 'DEPORTIVAS',
            'description_event_category' => 'eventos deportivos',
        ]);
    }
}
