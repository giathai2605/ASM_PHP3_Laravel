<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Tạo 5 dữ liệu mẫu
        DB::table('wishlist')->insert([
            [
                'user_id' => 1,
                'property_id' => 1,
            ],
            [
                'user_id' => 1,
                'property_id' => 2,
            ],
            [
                'user_id' => 1,
                'property_id' => 3,
            ],
            [
                'user_id' => 1,
                'property_id' => 4,
            ],
            [
                'user_id' => 1,
                'property_id' => 5,
            ],
        ]);
    }
}
