<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Tạo 5 dữ liệu mẫu
        DB::table('users')->insert([

            [
                'fullname' => 'Nguyễn Gia Thái',
                'username' => 'thai',
                'email' => 'thai@gmail.com',
                'phone' => '0123456789',
                'password' => bcrypt('123456'),
                'gender' => 1,
                'birthday' => '2003-05-26',
                'address' => 'Hà Nội',
                'role_id' => 2,
            ],
            [
                'fullname' => 'Lê Công Tiến',
                'username' => 'tien',
                'email' => 'tien@gmail.com',
                'phone' => '0123456788',
                'password' => bcrypt('123456'),
                'gender' => 1,
                'birthday' => '2003-02-07',
                'address' => 'Hà Nội',
                'role_id' => 1,
            ],
            [
                'fullname' => 'Nguyễn Công Sơn',
                'username' => 'son',
                'email' => 'son@gmail.com',
                'phone' => '0123456787',
                'password' => bcrypt('123456'),
                'gender' => 1,
                'birthday' => '2003-03-27',
                'address' => 'Hà Nội',
                'role_id' => 1,
            ],
            [
                'fullname' => 'Đặng Phương Nam',
                'username' => 'namdang',
                'email' => 'namdang@gmail.com',
                'phone' => '0123456786',
                'password' => bcrypt('123456'),
                'gender' => 1,
                'birthday' => '2003-03-07',
                'address' => 'Hà Nội',
                'role_id' => 1,
            ],
            [
                'fullname' => 'Phạm Đình Nam',
                'username' => 'nampham',
                'email' => 'nampham@gmail.com',
                'phone' => '0123456785',
                'password' => bcrypt('123456'),
                'gender' => 1,
                'birthday' => '2003-11-22',
                'address' => 'Hà Nội',
                'role_id' => 1,
            ],
        ]);
    }
}
