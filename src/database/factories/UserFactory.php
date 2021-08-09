<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Images;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'my_skills' => Str::random(30),
        'topics_interest' => Str::random(10),
        'edu_background' => Str::random(20),
        'work_history' => Str::random(30),
        'achieve_quali' => Str::random(10),
        'profile_image' => 'https://i.pravatar.cc/50?img='.Str::random(10),
    ];
});

$factory->define(Images::class, function (Faker $faker) {
    return [
        #'user_id' => $faker->numberBetween(1,3),
        'file_name' => $faker->sentence(7,11),
        'file_path' => $faker->sentence(7,11),
        'created_at' => $faker->numberBetween(1,3),
        'updated_at' => $faker->numberBetween(1,3),
    ];
});
