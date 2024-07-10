<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * model
 */
use App\Models\UserType;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        UserType::create([
            'name'  => 'Admin'
        ]);

        UserType::create([
            'name'  => 'Writer'
        ]);

        UserType::create([
            'name'  => 'Editor'
        ]);

    }
}
