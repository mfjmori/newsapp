<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Stock;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'url' => $faker->unique()->url,
        'image_url' => $faker->imageUrl,
        'title' => $faker->sentence(10),
        'body' => $faker->paragraph(),
        'source' => $faker->word(),
        'likes_count' => $faker->numberBetween($min = 0, $max = 1000),
        'published_at' => dateTime($max = 'now'),
    ];
});
