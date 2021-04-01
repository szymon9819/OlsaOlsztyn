<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    $name= $faker->word;
    return [
        'name' => $name,
        'shorthand'=> strtoupper(substr($name,0,3)),
        'league_id'=>null
    ];
});
