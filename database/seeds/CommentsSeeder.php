<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    public function run()
    {
        $comments = factory(App\Comments::class, 200)->create();
    }
}
