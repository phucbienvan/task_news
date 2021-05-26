<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'name' => 'Du lịch',
            'desc' => 'du lịch Việt Nam, du lịch thế giới',
            'created_at' => new DateTime()
        ]);
    }
}
