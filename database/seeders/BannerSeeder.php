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
                'link' => 'https://www.facebook.com',
                'status' => 1,
            ],
            [
                'title' => 'Banner 2',
                'link' => 'https://www.facebook.com',
                'status' => 1,
            ],
            [
                'title' => 'Banner 3',
                'link' => 'https://www.facebook.com',
                'status' => 1,
            ],
            [
                'title' => 'Banner 4',
                'link' => 'https://www.facebook.com',
                'status' => 1,
            ],
            [
                'title' => 'Banner 5',
                'link' => 'https://www.facebook.com',
                'status' => 1,
            ],
        ]);
    }
}
