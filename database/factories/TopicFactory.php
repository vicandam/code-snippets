<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Topic;
use App\User;
use Faker\Generator as Faker;

$factory->define(Topic::class, function (Faker $faker) {
    $user     = User::inRandomOrder()->get()->first();
    $category = Category::inRandomOrder()->get()->first();

    return [
        'user_id'     => $user->id,
        'category_id' => $category->id,
        'title'       => $faker->paragraph,
        'description' => $faker->text
    ];
});
