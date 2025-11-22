<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BCodingtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('b_codingtypes')->insert([
            ['pk_codingtype' => 1, 'codingtype' => 'دارایی', 'isenable' => 1],
            ['pk_codingtype' => 2, 'codingtype' => 'بدهی', 'isenable' => 1],
            ['pk_codingtype' => 3, 'codingtype' => 'سرمایه', 'isenable' => 1],
            ['pk_codingtype' => 4, 'codingtype' => 'درآمد', 'isenable' => 1],
            ['pk_codingtype' => 5, 'codingtype' => 'بهای تمام‌شده', 'isenable' => 1],
            ['pk_codingtype' => 6, 'codingtype' => 'هزینه', 'isenable' => 1],
        ]);
    }
}
