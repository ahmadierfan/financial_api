<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class MCompanySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('m_companies')->insert([
            ['pk_company' => 1, 'company' => 'شرکت آرا سرویس', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
