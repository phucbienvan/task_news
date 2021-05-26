<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'user_id' => 2,
            'news_id' => 1,
            'category_id' => 1,
            'content' => 'hay',
            'created_at' => new DateTime()
        ]);
    }
}
