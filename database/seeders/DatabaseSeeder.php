<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            MCompanySeeder::class,
            BSystemSeeder::class,
            BAccountingsubgroupSeeder::class,
            UserSeeder::class,
            BRoleSeeder::class,
            BApitypeSeeder::class,
            BMenuSeeder::class,
            BInvoicetypeSeeder::class,
            BProvinceSeeder::class,
            BCitySeeder::class,
            SMenucolumnSeeder::class,
            BApiSeeder::class,
            RMenusapiSeeder::class,
            RMenusroleSeeder::class,
            RUsersroleSeeder::class,
        ]);
    }
}
