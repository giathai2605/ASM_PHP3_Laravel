<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //tạo 5 dữ liệu mẫu
        DB::table('banners')->insert([
            
            [
                'title' => 'Banner 1',
                'image' => 'banner1.jpg',
                'description' => 'Banner 1',
                'link' => 'banner1',
                'status' => 1,
            ],
            [
                'title' => 'Banner 2',
                'image' => 'banner2.jpg',
                'description' => 'Banner 2',
                'link' => 'banner2',
                'status' => 1,
            ],
            [
                'title' => 'Banner 3',
                'image' => 'banner3.jpg',
                'description' => 'Banner 3',
                'link' => 'banner3',
                'status' => 1,
            ],
            [
                'title' => 'Banner 4',
                'image' => 'banner4.jpg',
                'description' => 'Banner 4',
                'link' => 'banner4',
                'status' => 1,
            ],
            [
                'title' => 'Banner 5',
                'image' => 'banner5.jpg',
                'description' => 'Banner 5',
                'link' => 'banner5',
                'status' => 1,
            ],
        ]);
    }
}
