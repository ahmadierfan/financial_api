<?php

namespace App\Http\Controllers\Sub;
use App\Http\Controllers\Controller;
use App\Models\s_finacialreqdetail;

class SFinacialreqdetailController extends Controller
{
    function justCreate($record, $fk_financialrequest)
    {

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
                    "fk_financialrequest" => $fk_financialrequest,
                ]
            );
        }
    }
    function recordsForWarehousedoc($fk_financialrequest)
    {
        $data = s_finacialreqdetail::select('s_finacialreqdetails.*')
            ->where('fk_financialrequest', $fk_financialrequest)
            ->get();

        return $data;
    }
    function deleteOldrecord($fk_financialrequest)
    {
        s_warehousedocdetail::where('fk_financialrequest', $fk_financialrequest)->delete();
    }
    function deleteAllrecords($fk_financialrequest)
    {
        s_warehousedocdetail::whereIn('fk_financialrequest', $fk_financialrequest)->delete();
    }
}
