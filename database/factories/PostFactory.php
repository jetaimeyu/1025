<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Ramsey\Uuid\Uuid;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->title,
        'user_id' => $faker->numberBetween(1, 50),
        'content' => $faker->text(1200),
        'description' => $faker->text(50),
        'uuid' => Uuid::uuid4(),
        'views' => $faker->numberBetween(1, 22)
    ];
});
