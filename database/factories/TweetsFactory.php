<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tweets;
use Faker\Generator as Faker;

$factory->define(Tweets::class, function (Faker $faker) {
    return [
        'user_id'=> factory(\App\User::class),
        'tweets'=> $faker->sentence()
    ];
});