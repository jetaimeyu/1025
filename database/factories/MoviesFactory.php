<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Movies::class, function (Faker $faker) {
    return [
        //
        'title'=>$faker->title,
        'director'=>$faker->numberBetween(1,50),


    ];
});
