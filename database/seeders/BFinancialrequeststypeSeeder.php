<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BFinancialrequeststypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('b_financialrequeststypes')->insert([
            ['pk_financialrequesttype' => 1, 'financialrequesttype' => 'دریافت', 'financialrequesttypesec' => 'Receive', 'isenable' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['pk_financialrequesttype' => 2, 'financialrequesttype' => 'پرداخت', 'financialrequesttypesec' => 'Payment', 'isenable' => 1, 'created_at' => now(), 'updated_at' => now()],
            
        ]);
    }
}
