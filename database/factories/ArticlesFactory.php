<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'created_by_id' => 1,
        'type' => $faker->randomElement(['Condoléances','Communiqué','Test']),
        'titre' => $faker->realText(60),
        'article' => $faker->realText(200),
        'slug' => \Illuminate\Support\Str::slug($faker->realText(60)),
        'is_published' => $faker->boolean,
    ];
});
