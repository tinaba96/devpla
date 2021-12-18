<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Post;
use App\Chatgroup;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Chatgroup::class, function (Faker $faker) {
    return [
        'name' => $faker->realText(10),
        'created_at' => $faker->numberBetween(1,3),
        'updated_at' => $faker->numberBetween(1,3),
    ];
});
