<?php

use Faker\Generator as Faker;
use App\User;

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

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'text' => $faker->realText,
        'user_id' => User::inRandomOrder()->first()->id,
        'popularity' => mt_rand(1, 999),
        'created_at' => date('Y-m-d ') . mt_rand(10, 12) . ':' . mt_rand(10, 59) . ':' . mt_rand(10, 59),
    ];
});
