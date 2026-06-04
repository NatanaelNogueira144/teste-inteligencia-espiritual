<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(FeedbackSeeder::class);
    }
}
