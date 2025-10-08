<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CleanUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('r_usersroles')->truncate();
        DB::table('r_menusroles')->truncate();
        DB::table('r_menusapis')->truncate();
        DB::table('b_menus')->truncate();
        DB::table('b_systems')->truncate();
        DB::table('b_accountingsubgroups')->truncate();
        DB::table('b_banks')->truncate();
        DB::table('b_apis')->truncate();
        DB::table('b_apitypes')->truncate();
        DB::table('b_roles')->truncate();
        DB::table('m_companies')->truncate();
        DB::table('s_useraddresses')->truncate();
        DB::table('s_menucolumns')->truncate();
        DB::table('m_moneyboxes')->truncate();
        DB::table('users')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
