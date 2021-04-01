<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'content' => $faker->text,
        'status' => $faker->boolean,
        'thumbnail' => '',
        'post_category_id' =>  random_int(1,4),
    ];
});
