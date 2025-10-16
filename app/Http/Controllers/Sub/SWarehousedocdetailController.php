<?php

namespace App\Http\Controllers\Sub;

use App\Http\Controllers\Controller;

use App\Models\s_warehousedocdetail;

class SWarehousedocdetailController extends Controller
{
    function justCreate($record, $fk_warehousedoc)
    {
        if (!isset($record['isguarantee']))
            $record['isguarantee'] = false;

        if (isset(auth()->user()->id)) {
            s_warehousedocdetail::create(
                [
                    "fk_registrar" => auth()->user()->id,
                    "fk_product" => $record['fk_product'],
                    "fk_unit" => $record['fk_unit'] != '' ? $record['fk_unit'] : null,
                    "feeprice" => $record['feeprice'],
                    "count" => $record['count'],
                    "discountamount" => $record['discountamount'],
                    "discountpercent" => $record['discountpercent'],
                    "taxamount" => $record['taxamount'],
                    "taxpercent" => $record['taxpercent'],
                    "finalprice" => $record['finalprice'],
                    "totalprice" => $record['count'] * $record['feeprice'],
                    "fk_warehousedoc" => $fk_warehousedoc,
                ]
            );
        }
    }
    function recordsForWarehousedoc($fk_warehousedoc)
    {
        $data = s_warehousedocdetail::select('s_warehousedocdetails.*', 'm_products.product')
            ->where('fk_warehousedoc', $fk_warehousedoc)
            ->join('m_products', 's_warehousedocdetails.fk_product', '=', 'm_products.pk_product')
            ->get();

        return $data;
    }
    function deleteOldrecord($fk_warehousedoc)
    {
        s_warehousedocdetail::where('fk_warehousedoc', $fk_warehousedoc)->delete();
    }
    function deleteAllrecords($fk_warehousedoc)
    {
        s_warehousedocdetail::whereIn('fk_warehousedoc', $fk_warehousedoc)->delete();
    }
}
