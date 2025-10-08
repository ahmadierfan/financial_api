<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class RUsersroleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('r_usersroles')->insert([
            ['pk_userrole' => 1, 'fk_role' => 2, 'fk_registrar' => '1', 'fk_user' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['pk_userrole' => 2, 'fk_role' => 3, 'fk_registrar' => '1', 'fk_user' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['pk_userrole' => 3, 'fk_role' => 4, 'fk_registrar' => '1', 'fk_user' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
