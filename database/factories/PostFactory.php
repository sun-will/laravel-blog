<?php

use Faker\Generator as Faker;

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
        'cat_id' =>  rand(1, 10),
        'user_id' =>  rand(1, 10),
        'comment_id' =>  rand(1, 10),
        'title' =>  $faker->sentence,
        'description' =>  $faker->paragraph,
        'photo' =>  $faker->imageUrl,
    ];
});
