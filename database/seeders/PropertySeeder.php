<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //tạo 5 dữ liệu mẫu
        DB::table('properties')->insert([
            [
                'name' => 'Căn hộ 1',
                'price' => 100000,
                'area' => 100,
                'address' => 'Hà Nội',
                'description' => 'Căn hộ 1',
                'contact_phone' => '0123456789',
                'user_id' => 1,
                'category_id' => 1,
                
                
            ],
            [
                'name' => 'Căn hộ 2',
                'price' => 2000000,
                'area' => 200,
                'address' => 'Hà Nội',
                'description' => 'Căn hộ 2',
                'contact_phone' => '0123456789',
                'user_id' => 1,
                'category_id' => 2,
                
                
            ],
            [
                'name' => 'Căn hộ 3',
                'price' => 30000000,
                'area' => 300,
                'address' => 'Hà Nội',
                'description' => 'Căn hộ 3',
                'contact_phone' => '0123456789',
                'user_id' => 1,
                'category_id' => 3,
                
                
            ],
            [
                'name' => 'Căn hộ 4',
                'price' => 4000000,
                'area' => 400,
                'address' => 'Hà Nội',
                'description' => 'Căn hộ 4',
                'contact_phone' => '0123456789',
                'user_id' => 1,
                'category_id' => 4,
                
                
            ],
            [
                'name' => 'Căn hộ 5',
                'price' => 5000000,
                'area' => 500,
                'address' => 'Hà Nội',
                'description' => 'Căn hộ 5',
                'contact_phone' => '0123456789',
                'user_id' => 1,
                'category_id' => 5,
                
                
            ]
        ]);
    }
}
