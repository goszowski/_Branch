<?php

use Faker\Generator as Faker;
use App\User;
use App\Post;
use App\Comment;

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

$factory->define(App\Comment::class, function (Faker $faker) {

    $con = mt_rand(0,1);

    if(!$con and !Comment::whereNull('comment_id')->exists())
    {
      $con = true;
    }

    // $con = false;

    return [
        'text' => $faker->realText,
        'post_id' => $con ? Post::inRandomOrder()->first()->id : null,
        'user_id' => User::inRandomOrder()->first()->id,
        'comment_id' => !$con ? Comment::whereNull('comment_id')->inRandomOrder()->first()->id : null,
        'created_at' => date('Y-m-d ') . mt_rand(10, 12) . ':' . mt_rand(10, 59) . ':' . mt_rand(10, 59),
    ];
});
