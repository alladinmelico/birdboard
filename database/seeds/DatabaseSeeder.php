<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();
        $this->call(UserSeeder::class);
        $this->call(TweetsSeeder::class);
        $this->call(CommentsSeeder::class);
        Model::reguard();
    }
}