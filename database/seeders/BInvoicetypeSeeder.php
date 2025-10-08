<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class BInvoicetypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('b_invoicetypes')->insert([
            ['pk_invoicetype' => 1, 'invoicetype' => 'فاکتور فروش', 'isenable' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['pk_invoicetype' => 2, 'invoicetype' => 'فاکتور خرید', 'isenable' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['pk_invoicetype' => 3, 'invoicetype' => 'فاکتور برگشتی', 'isenable' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
