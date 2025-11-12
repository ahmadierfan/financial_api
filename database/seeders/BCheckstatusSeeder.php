<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BCheckstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('b_checkstatuses')->insert([
            ['pk_checkstatus' => 1, 'checkstatus' => 'عادی', 'checkstatussec' => 'Normal', 'isenable' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['pk_checkstatus' => 2, 'checkstatus' => 'سررسید گذشته', 'checkstatussec' => 'Past Due', 'isenable' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['pk_checkstatus' => 3, 'checkstatus' => 'در جریان وصول', 'checkstatussec' => 'In Collection Process', 'isenable' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['pk_checkstatus' => 4, 'checkstatus' => 'وصول شده', 'checkstatussec' => 'Collected', 'isenable' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['pk_checkstatus' => 5, 'checkstatus' => 'عودت شده', 'checkstatussec' => 'Returned', 'isenable' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['pk_checkstatus' => 6, 'checkstatus' => 'خرج شده', 'checkstatussec' => 'Endorsed', 'isenable' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);

    }
}
