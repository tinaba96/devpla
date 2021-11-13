<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Comment;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'created_at' => $faker->date('Y-m-d H:i:s', 'now'),
        'updated_at' => $faker->date('Y-m-d H:i:s', 'now'),
        'post_id' => $faker->numberBetween(1,20),
        'body' => $faker->realText(20),
        'user_id' => $faker->numberBetween($min = 1, $max = 50),
    ];
});
