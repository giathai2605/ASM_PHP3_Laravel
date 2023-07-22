<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //tạo 5 dữ liệu mẫu
        DB::table('property_image')->insert([
            [
                'property_id' => 1,
                'image' => 'https://images.crowdspring.com/blog/wp-content/uploads/2017/08/23163415/pexels-binyamin-mellish-106399.jpg',
            ],
            [
                'property_id' => 1,
                'image' => 'https://images.crowdspring.com/blog/wp-content/uploads/2017/08/23163415/pexels-binyamin-mellish-106399.jpg',
            ],
            [
                'property_id' => 1,
                'image' => 'https://images.crowdspring.com/blog/wp-content/uploads/2017/08/23163415/pexels-binyamin-mellish-106399.jpg',
            ],
            [
                'property_id' => 2,
                'image' => 'https://images.crowdspring.com/blog/wp-content/uploads/2017/08/23163415/pexels-binyamin-mellish-106399.jpg',
            ],
            [
                'property_id' => 2,
                'image' => 'https://images.crowdspring.com/blog/wp-content/uploads/2017/08/23163415/pexels-binyamin-mellish-106399.jpg',
            ],
            [
                'property_id' => 2,
                'image' => 'https://images.crowdspring.com/blog/wp-content/uploads/2017/08/23163415/pexels-binyamin-mellish-106399.jpg',
            ],
            [
                'property_id' => 3,
                'image' => 'https://images.crowdspring.com/blog/wp-content/uploads/2017/08/23163415/pexels-binyamin-mellish-106399.jpg',
            ],
            [
                'property_id' => 3,
                'image' => 'https://images.crowdspring.com/blog/wp-content/uploads/2017/08/23163415/pexels-binyamin-mellish-106399.jpg',
            ],
            [
                'property_id' => 3,
                'image' => 'https://images.crowdspring.com/blog/wp-content/uploads/2017/08/23163415/pexels-binyamin-mellish-106399.jpg',
            ]
        ]);
            
    }
}
