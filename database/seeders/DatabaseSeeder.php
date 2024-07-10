<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserTypeSeeder::class,
            UserStatus::class,
            UserSeeder::class,
            CompanyStatus::class,
            CompanySeeder::class,
            ArticleStatusSeeder::class
        ]);
    }
}
