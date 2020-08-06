<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\User;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        //
        'content' => $faker->text($maxNbChars = 200),
        'user_id' => User::all()->random(),
        'post_id' => Post::all()->random()
    ];
});
