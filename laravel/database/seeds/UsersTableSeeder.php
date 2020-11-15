<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'Kotaro', 'email' => 'kotaro@gmail.com', 'password' => bcrypt('testtest'), 'user_type' => 3],
            ['name' => 'Admin', 'email' => 'info@bon-bon.co.jp', 'password' => bcrypt('hzbSj3Fmc6tw'), 'user_type' => 3],
        ]);
    }
}
