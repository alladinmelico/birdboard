<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comments;
use Faker\Generator as Faker;

$factory->define(Comments::class, function (Faker $faker) {
    return [
        'tweet_id'=> factory(\App\Tweets::class),
        'user_id'=> factory(\App\User::class),
        'body'=> $faker->sentence()
    ];
});