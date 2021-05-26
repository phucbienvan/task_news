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
            'name' => 'van phuc',
            'image' => 'phuc.jpg',
            'email' => 'vanphuc@gmail.canh',
            'password' => '123',
            'level' => 1,
            'created_at' => new DateTime()
        ]);
    }
}
