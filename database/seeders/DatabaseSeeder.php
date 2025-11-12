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
            BAccountingsubgroupSeeder::class,
            UserSeeder::class,
            BInvoicetypeSeeder::class,
            BProvinceSeeder::class,
            BCitySeeder::class,
            BWarehousedoctypeSeeder::class,
            BFinancialrequeststypeSeeder::class,
            BFinancialpaymentmethodSeeder::class,
            BCheckstatusSeeder::class,

        ]);
    }
}
