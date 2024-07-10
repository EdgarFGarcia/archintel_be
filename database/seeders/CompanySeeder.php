<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * model
 */
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Company::create([
            'logo'                  => 'https://img.freepik.com/free-vector/gradient-logo_23-2148149233.jpg?t=st=1720621520~exp=1720625120~hmac=8b193e59fd9d58760cf366ec7a411ecf6170307419bdae007f9c52ae0aa051bc&w=1380',
            'name'                  => 'Abstract Company',
            'company_status_id'     => 1
        ]);

        Company::create([
            'logo'                  => 'https://img.freepik.com/free-vector/friends-logo-template_23-2149505594.jpg?t=st=1720619590~exp=1720623190~hmac=5455037ebcd1959a69f84b49d1e802502cc6426b1569ef793a2b01ce3f6468d8&w=1380',
            'name'                  => 'Friends Company',
            'company_status_id'     => 1
        ]);

        Company::create([
            'logo'                  => 'https://img.freepik.com/premium-vector/abstract-interconnect-square-logo-design-template_76712-205.jpg?w=1380',
            'name'                  => 'Venture Company',
            'company_status_id'     => 1
        ]);
    }
}
