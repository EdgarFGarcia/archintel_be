<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * user
 */
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name'              => 'Admin',
            'firstname'         => 'Admin',
            'lastname'          => 'Admin',
            'user_type_id'      => 1,
            'user_status_id'    => 1,
            'email'             => 'admin@gmail.com',
            'password'          => Hash::make('password123'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);

        User::create([
            'name'              => 'Writer',
            'firstname'         => 'Writer',
            'lastname'          => 'Writer',
            'user_type_id'      => 2,
            'user_status_id'    => 1,
            'email'             => 'writer@gmail.com',
            'password'          => Hash::make('password123'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);

        User::create([
            'name'              => 'Editor',
            'firstname'         => 'Editor',
            'lastname'          => 'Editor',
            'user_type_id'      => 3,
            'user_status_id'    => 1,
            'email'             => 'editor@gmail.com',
            'password'          => Hash::make('password123'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);
    }
}
