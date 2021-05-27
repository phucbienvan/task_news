<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'phucdz',
            'image' => 'phuc.jpg',
            'email' => 'phucdz@gmail.canh',
            'password' => bcrypt('123456'),
            'level' => 1,
            'created_at' => new DateTime()
        ]);
    }
}
