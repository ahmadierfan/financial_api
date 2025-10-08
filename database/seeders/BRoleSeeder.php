<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class BRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('b_roles')->insert([
            ['pk_role' => 1, 'role' => 'عمومی', 'fk_registrar' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['pk_role' => 2, 'role' => 'ادمین', 'fk_registrar' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['pk_role' => 3, 'role' => 'تکنسین', 'fk_registrar' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['pk_role' => 4, 'role' => 'مشتری', 'fk_registrar' => '1', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
