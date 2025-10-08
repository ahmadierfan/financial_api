<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BSystemSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('b_systems')->insert([
            ['pk_system' => 1, 'system' => 'اطلاعات پایه', 'created_at' => now(), 'updated_at' => now()],
            ['pk_system' => 2, 'system' => 'حسابداری', 'created_at' => now(), 'updated_at' => now()],
            ['pk_system' => 3, 'system' => 'انبارداری', 'created_at' => now(), 'updated_at' => now()],
            ['pk_system' => 4, 'system' => 'بازرگانی', 'created_at' => now(), 'updated_at' => now()],
            ['pk_system' => 5, 'system' => 'خزانه داری', 'created_at' => now(), 'updated_at' => now()],
            ['pk_system' => 6, 'system' => 'تعمیرات', 'created_at' => now(), 'updated_at' => now()],
            ['pk_system' => 7, 'system' => 'سی آر ام', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
