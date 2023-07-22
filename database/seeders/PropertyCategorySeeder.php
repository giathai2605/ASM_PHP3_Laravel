<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PropertyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //tạo 5 dữ liệu mẫu
        DB::table('property_category')->insert([
            [
                'name' => 'Nhà ở',
            
            ],
            [
                'name' => 'Đất nền',
              
            ],
            [
                'name' => 'Căn hộ',
              
            ],
            [
                'name' => 'Văn phòng',
                
    
            ],
            [
                'name' => 'Cửa hàng',
              

            ],
        ]);
    }
}
