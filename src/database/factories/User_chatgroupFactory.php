<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Post;
use App\User_chatgroup;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User_chatgroup::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'chatgroup_id' => $faker->numberBetween($min = 1, $max = 10),
        'created_at' => $faker->numberBetween(1,3),
        'updated_at' => $faker->numberBetween(1,3),
    ];
});
