<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class BCodingnatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('b_codingnatures')->insert([
            [
                'pk_codingnature' => 1,
                'codingnature' => 'بدهکار',
            ],
            [
                'pk_codingnature' => 2,
                'codingnature' => 'بستانکار',
            ]
        ]);
    }
}
