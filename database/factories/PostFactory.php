<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title=$faker->realText(rand(10, 40));
    return [
        'title' => $title,
        'author_id' => factory(User::class),
        'short_title' => Str::length($title) > 30 ? Str::substr($title, 0, 30) . '...' : $title,
        'description' =>$faker->realText(rand(100, 500)),
        'created_at' =>$faker->dateTimeBetween('-30 days','-1 days'),

    ];
});
