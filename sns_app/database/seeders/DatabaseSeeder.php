<?php

namespace Database\Seeders;

use App\Models\Tweet;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Tweet::factory(10)->create();
        Comment::factory(10)->create();
    }
}
