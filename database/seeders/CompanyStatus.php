<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * model
 */
use App\Models\CompanyStatus as CompanyModel;

class CompanyStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        CompanyModel::create([
            'name'      => 'Active'
        ]);

        CompanyModel::create([
            'name'      => 'Inactive'
        ]);
    }
}
