<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PostTag;
use Faker\Generator as Faker;

$factory->define(PostTag::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});
