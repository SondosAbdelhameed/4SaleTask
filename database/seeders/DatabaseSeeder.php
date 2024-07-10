<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Meal;
use App\Models\Table;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        Meal::factory(50)->create();
        Table::factory(10)->create();
    }
}
