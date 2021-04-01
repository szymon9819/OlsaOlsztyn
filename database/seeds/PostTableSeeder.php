<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Post::class, 40)->create();

//        $tags = App\Models\PostTag::all()->pluck('id')->toArray();
//        $posts = App\Models\Post::all()->each(function ($post) use ($tags) {
//            echo( $tags->random(rand(1, $tags->count() - 1))->pluck('id')->toArray());
//            $post->tags()->attach(
//                array_rand($tags,rand(0,count($tags)-1))
////                $tags->random(rand(1, $tags->count() - 1))->pluck('id')->toArray()
//            );
//        });
    }
}
