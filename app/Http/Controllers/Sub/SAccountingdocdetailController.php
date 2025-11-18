<?php

namespace App\Http\Controllers\Sub;

use App\Http\Controllers\Controller;

use App\Models\s_accountingdocdetail;

class SAccountingdocdetailController extends Controller
{
    function justCreate($record, $fk_accountingdoc)
    {
    

        if (isset(auth()->user()->id)) {
            s_accountingdocdetail::create(
                [
                    "fk_registrar" => auth()->user()->id,
                    "fk_coding" =>!empty($record['fk_coding']) ? $record['fk_coding'] : null,
                    "fk_accountingsub" => $record['fk_accountingsub'],
                    "debtor" => $record['debtor'],
                    "creditor" => $record['creditor'],
                    "description" => $record['description'],
                    "fk_accountingdoc" => $fk_accountingdoc,
                ]
            );
        }
    }
    function recordsForAccountingdoc($fk_accountingdoc)
    {
        $data = s_accountingdocdetail::select('s_accountingdocdetails.*')
            ->where('fk_accountingdoc', $fk_accountingdoc)
            ->get();

        return $data;
    }
    function deleteOldRecords($fk_accountingdoc)
    {
        s_accountingdocdetail::where('fk_accountingdoc', $fk_accountingdoc)->delete();
    }
    function deleteAllrecords($fk_accountingdoc)
    {
        s_accountingdocdetail::whereIn('fk_accountingdoc', $fk_accountingdoc)->delete();
    }
    
}
