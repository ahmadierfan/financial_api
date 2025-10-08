<?php

namespace App\Http\Controllers\Sub;

use App\Http\Controllers\Controller;

use App\Models\s_invoicedetail;

class SInvoicedetailController extends Controller
{
    function justCreate($record, $fk_invoice)
    {
        if (!isset($record['isguarantee']))
            $record['isguarantee'] = false;

        if (isset(auth()->user()->id)) {
            s_invoicedetail::create(
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
                    "fk_invoice" => $fk_invoice,
                ]
            );
        }
    }
    function recordsForInvoice($fk_invoice)
    {
        $data = s_invoicedetail::select('s_invoicedetails.*', 'm_products.product')
            ->where('fk_invoice', $fk_invoice)
            ->join('m_products', 's_invoicedetails.fk_product', '=', 'm_products.pk_product')
            ->get();

        return $data;
    }
    function deleteOldrecord($fk_invoice)
    {
        s_invoicedetail::where('fk_invoice', $fk_invoice)->delete();
    }
}
