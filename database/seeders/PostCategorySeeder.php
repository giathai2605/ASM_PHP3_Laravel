<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //tạo 5 dữ liệu mẫu
        DB::table('post_category')->insert([
            [
                'name' => 'Tin tức',
               
            ],
            [
                'name' => 'Khuyến mãi',
                
            ],
            [
                'name' => 'Sự kiện',
                
            ],
            [
                'name' => 'Tuyển dụng',
                
            ],
            [
                'name' => 'Liên hệ',
               
            ],
        ]);
    }
}
