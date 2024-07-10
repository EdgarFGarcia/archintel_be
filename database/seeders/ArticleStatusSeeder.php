<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * model
 */
use App\Models\ArticleStatus;

class ArticleStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ArticleStatus::create([
            'name'  => 'For Edit'
        ]);

        ArticleStatus::create([
            'name'  => 'Published'
        ]);
    }
}
