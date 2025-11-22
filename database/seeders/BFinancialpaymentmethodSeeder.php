<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BFinancialpaymentmethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('b_financialpaymentmethods')->insert([
            ['pk_financialpaymentmethod' => 1, 'isinpay' => 1, 'isenable' => 1, 'isinreceive' => 1, 'financialpaymentmethod' => 'چک'],
            ['pk_financialpaymentmethod' => 2, 'isinpay' => 1, 'isenable' => 1, 'isinreceive' => 1, 'financialpaymentmethod' => 'صندوق'],
            ['pk_financialpaymentmethod' => 3, 'isinpay' => 1, 'isenable' => 1, 'isinreceive' => 1, 'financialpaymentmethod' => 'بانک'],
            ['pk_financialpaymentmethod' => 4, 'isinpay' => 1, 'isenable' => 1, 'isinreceive' => 0, 'financialpaymentmethod' => 'خرج‌چک'],
            ['pk_financialpaymentmethod' => 5, 'isinpay' => 1, 'isenable' => 0, 'isinreceive' => 1, 'financialpaymentmethod' => 'تنخواه'],
            ['pk_financialpaymentmethod' => 6, 'isinpay' => 1, 'isenable' => 0, 'isinreceive' => 1, 'financialpaymentmethod' => 'اشخاص'],

        ]);
    }
}
