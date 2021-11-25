<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->text(rand(10, 80)),
        'description' => $faker->text(rand(30, 500)),
        'category_id' => \App\Category::all()->random()->id,
        'user_id' => \App\User::all()->random()->id,
    ];
});
