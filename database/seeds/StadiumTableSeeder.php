<?php

use Illuminate\Database\Seeder;

class StadiumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Stadium::class,5)->create();
    }
}
