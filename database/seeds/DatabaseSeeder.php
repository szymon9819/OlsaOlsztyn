<?php

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
//             UserTableSeeder::class,
            PostCategoryTableSeeder::class,
            PostTagTableSeeder::class,
            StadiumTableSeeder::class,
            PostTableSeeder::class,
            TeamTableSeeder::class,
        ]);
    }
}
