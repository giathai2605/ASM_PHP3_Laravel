<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //tạo 5 dữ liệu mẫu
        DB::table('posts')->insert([
            [
                'title' => 'Bài viết 1',
               
                'content' => 'Nội dung bài viết 1',
                'category_id' => 1,
                'user_id' => 1,
                'status' => 1,
        
            ],
            [
                'title' => 'Bài viết 2',
               
                'content' => 'Nội dung bài viết 2',
                'category_id' => 2,
                'user_id' => 1,
                'status' => 1,
           
            ],
            [
                'title' => 'Bài viết 3',
              
                'content' => 'Nội dung bài viết 3',
                'category_id' => 3,
                'user_id' => 1,
                'status' => 1,
          
            ],
            [
                'title' => 'Bài viết 4',
       
                'content' => 'Nội dung bài viết 4',
                'category_id' => 4,
                'user_id' => 1,
                'status' => 1,
             
            ],
            [
                'title' => 'Bài viết 5',

                'content' => 'Nội dung bài viết 5',
                'category_id' => 5,
                'user_id' => 1,
                'status' => 1,
              
            ],
        ]);
    }
}
