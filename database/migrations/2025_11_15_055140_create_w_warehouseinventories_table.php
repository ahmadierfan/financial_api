<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW w_warehouseinventories AS
                SELECT
                    t.fk_product,
                    t.warehouse_id,
                    t.fk_company,
                    t.productname,
                    w.warehouse,
                    SUM(t.quantity_change) AS inventory
                FROM (
                
                    SELECT
                        fk_product,
                        fk_warehouse AS warehouse_id,
                        fk_company,
                        productname,
                        CASE
                            WHEN fk_warehousedoctype = 1 THEN count
                            WHEN fk_warehousedoctype = 3 THEN -count
                            WHEN fk_warehousedoctype = 2 THEN -count
                        END AS quantity_change
                    FROM w_warehousekardexes

                    UNION ALL

                    
                    SELECT
                        fk_product,
                        fk_destinationwarehouse AS warehouse_id,
                        fk_company,
                        productname,
                        count AS quantity_change
                    FROM w_warehousekardexes
                    WHERE fk_warehousedoctype = 2
                ) AS t
                LEFT JOIN m_warehouses w ON t.warehouse_id = w.pk_warehouse
                GROUP BY
                    t.fk_company,
                    t.fk_product,
                    productname,
                    w.warehouse,
                    t.warehouse_id;
                    
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        

        DB::statement('DROP VIEW IF EXISTS w_warehouseinventories');
    }
};
