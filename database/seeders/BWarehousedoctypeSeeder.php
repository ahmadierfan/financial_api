<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BWarehousedoctypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('b_warehousedoctypes')->insert([
            ['pk_warehousedoctype' => 1, 'warehousedoctype' => 'رسید', 'isenable' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['pk_warehousedoctype' => 2, 'warehousedoctype' => 'انتقال', 'isenable' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['pk_warehousedoctype' => 3, 'warehousedoctype' => 'انتقال بین انبار', 'isenable' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['pk_warehousedoctype' => 4, 'warehousedoctype' => 'حواله', 'isenable' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
