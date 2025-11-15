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
            CREATE VIEW w_warehousekardexes AS
            SELECT
                d.pk_warehousedocdetail AS pk_warehousedocdetail,
                d.fk_warehousedoc AS fk_warehousedoc,
                d.fk_product AS fk_product,
                p.product AS productname,
                d.fk_unit AS fk_unit,
                reg.fk_company AS fk_company,
                uunit.unit AS unit,
                d.feeprice AS feeprice,
                d.count AS count,
                d.totalprice AS totalprice,
                d.discountpercent AS discountpercent,
                d.discountamount AS discountamount,
                d.taxpercent AS taxpercent,
                d.taxamount AS taxamount,
                d.finalprice AS finalprice,
                wdoc.pk_warehousedoc AS pk_warehousedoc,
                wdoc.fk_registrar AS fk_registrar,
                wdoc.fk_warehouse AS fk_warehouse,
                wdoc.fk_destinationwarehouse AS fk_destinationwarehouse,
                wdoc.fk_invoice AS fk_invoice,
                wdoc.warehousedocdate AS warehousedocdate,
                pdate(substr( `wdoc`.`warehousedocdate`, 1, 10 )) as jalaliwarehousedocdate,
                wdoc.warehousedoccode AS warehousedoccode,
                wdoc.description AS description,
                wdoc.isenable AS isenable,
                wdoc.created_at AS created_at,
                wdoc.updated_at AS updated_at,
                wdoc.fk_warehousedoctype as fk_warehousedoctype,
                wtype.warehousedoctype AS warehousedoctype, 
                worigin.warehouse AS originwarehouse,
                wdest.warehouse AS destinationwarehouse,
                inv.invoicecode AS invoicecode,
                CONCAT_WS(' ', reg.name, reg.lastname) AS registrarfullname
            FROM
                s_warehousedocdetails d
                JOIN m_warehousedocs wdoc ON d.fk_warehousedoc = wdoc.pk_warehousedoc
                JOIN users reg ON wdoc.fk_registrar = reg.id
                LEFT JOIN m_warehouses worigin ON wdoc.fk_warehouse = worigin.pk_warehouse
                LEFT JOIN m_warehouses wdest ON wdoc.fk_destinationwarehouse = wdest.pk_warehouse
                LEFT JOIN m_invoices inv ON wdoc.fk_invoice = inv.pk_invoice
                LEFT JOIN m_products p ON d.fk_product = p.pk_product
                LEFT JOIN b_units uunit ON d.fk_unit = uunit.pk_unit
                LEFT JOIN b_warehousedoctypes wtype ON wdoc.fk_warehousedoctype = wtype.pk_warehousedoctype
        ");


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         DB::statement('DROP VIEW IF EXISTS w_warehousekardexes');
    }
};
