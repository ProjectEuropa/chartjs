<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PrefecturesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(WardsTableSeeder::class);
        $this->call(FacilitiesTableSeeder::class);
        $this->call(InputRecordsTableSeeder::class);
    }
}
