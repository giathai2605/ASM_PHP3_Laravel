<?php

namespace Database\Seeders;

use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoleSeeder::class,
            WishlistSeeder::class,
            PropertyCategorySeeder::class,
            PropertySeeder::class,
            PropertyImageSeeder::class,
            PostSeeder::class,
            CommentSeeder::class,
            PostCategorySeeder::class,
            BannerSeeder::class,

        ]);
        // \App\Models\User::factory(10)->create();
    }
}
