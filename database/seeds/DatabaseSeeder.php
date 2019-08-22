<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(PeopleTableSeeder::class);
        $this->call(UsersTableSeeder::class);


        //PROVINCE -CANTON -PARISH
        $this->call(ProvinceTableSeeder::class);
        $this->call(CantonTableSeeder::class);
        $this->call(ParishTableSeeder::class);

    }

}
