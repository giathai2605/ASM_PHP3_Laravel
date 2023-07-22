<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //tạo 5 dữ liệu mẫu
        DB::table('comments')->insert([
            [
                'content' => 'Bình luận 1',
                'user_id' => 1,
                'post_id' => 1,
               
            ],
            [
                'content' => 'Bình luận 2',
                'user_id' => 1,
                'post_id' => 2,
               
            ],
            [
                'content' => 'Bình luận 3',
                'user_id' => 1,
                'post_id' => 3,
               
            ],
            [
                'content' => 'Bình luận 4',
                'user_id' => 1,
                'post_id' => 4,
               
            ],
            [
                'content' => 'Bình luận 5',
                'user_id' => 1,
                'post_id' => 5,
               
            ],
        ]);
    }
}
