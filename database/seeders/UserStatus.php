<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * model
 */
use App\Models\UserStatus as StatusModel;

class UserStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        StatusModel::create([
            'name' => 'Active'
        ]);

        StatusModel::create([
            'name' => 'Inactive'
        ]);
    }
}
