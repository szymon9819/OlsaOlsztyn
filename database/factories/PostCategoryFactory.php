<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PostCategory;
use Faker\Generator as Faker;

$factory->define(PostCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->realText($maxNbChars = 35, $indexSize = 2)
    ];
});
