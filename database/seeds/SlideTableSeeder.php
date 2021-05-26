<?php

use Illuminate\Database\Seeder;

class SlideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            'name' => 'nước',
            'image' => 'water.jpg',
            'desc' => 'Nước đóng cha',
            'link' => 'https://www.24h.com.vn/tap-doan-amaccao/vi-sao-nguoi-nhat-chon-uong-nuoc-ion-kiem-hang-ngay-c937a1255679.html',
            'created_at' => new DateTime()
        ]);
    }
}
