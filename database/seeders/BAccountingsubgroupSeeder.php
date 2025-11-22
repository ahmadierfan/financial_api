<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class BAccountingsubgroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('b_accountingsubgroups')->insert([
            ['pk_accountingsubgroup' => 1, 'accountingsubgroup' => 'اشخاص'],
            ['pk_accountingsubgroup' => 10, 'accountingsubgroup' => 'بانک'],
            ['pk_accountingsubgroup' => 11, 'accountingsubgroup' => 'صندوق'],
            ['pk_accountingsubgroup' => 2, 'accountingsubgroup' => 'کالا'],
            ['pk_accountingsubgroup' => 3, 'accountingsubgroup' => 'خدمات'],
            ['pk_accountingsubgroup' => 4, 'accountingsubgroup' => 'قراردادها'],
            ['pk_accountingsubgroup' => 5, 'accountingsubgroup' => 'پروژه‌ها'],
            ['pk_accountingsubgroup' => 6, 'accountingsubgroup' => 'مراکز هزینه'],
            ['pk_accountingsubgroup' => 7, 'accountingsubgroup' => 'مراکز درآمد'],
            ['pk_accountingsubgroup' => 12, 'accountingsubgroup' => 'انبار'],
        ]);


    }
}
