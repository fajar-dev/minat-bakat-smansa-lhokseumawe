<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\ResultSeeder;
use Database\Seeders\QuestionSeeder;
use Database\Seeders\RecomemdedSeeder;
use Database\Seeders\OrganizationSeeder;
use Database\Seeders\OrganizationCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            OrganizationCategorySeeder::class,
            OrganizationSeeder::class,
            QuestionSeeder::class,
            ResultSeeder::class,
            RecomemdedSeeder::class,
        ]);
    }
}
