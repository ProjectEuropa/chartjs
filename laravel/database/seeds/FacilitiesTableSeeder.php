<?php

use Illuminate\Database\Seeder;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $facilities = array(
            array('id' => '1','name' => 'ニコニコ介護ホーム','city_id' => '668','ward_id' => '59','type_id' => '1','created_at' => NULL,'updated_at' => NULL),
            array('id' => '2','name' => 'ほげほげ介護ホーム','city_id' => '668','ward_id' => '60','type_id' => '2','created_at' => NULL,'updated_at' => NULL)
          );          
        DB::table('facilities')->insert($facilities);
    }
}
