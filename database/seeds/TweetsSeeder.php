<?php

use Illuminate\Database\Seeder;

class TweetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $tweets = factory(App\Tweets::class, 50)->create();
        factory(App\Tweets::class, 100)->create()->each( function ($tweet) {
            $tweet->issues()->save(factory(App\Issues));
        });
    }
}