<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;


use Illuminate\Database\Seeder;

class BApitypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('b_apitypes')->insert([
            ['pk_apitype' => 1, 'apitype' => 'get', 'created_at' => now(), 'updated_at' => now()],
            ['pk_apitype' => 2, 'apitype' => 'create', 'created_at' => now(), 'updated_at' => now()],
            ['pk_apitype' => 3, 'apitype' => 'update', 'created_at' => now(), 'updated_at' => now()],
            ['pk_apitype' => 4, 'apitype' => 'delete', 'created_at' => now(), 'updated_at' => now()],
            ['pk_apitype' => 5, 'apitype' => 'other', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
