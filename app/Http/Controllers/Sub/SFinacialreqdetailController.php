<?php

namespace App\Http\Controllers\Sub;

use App\Http\Controllers\Controller;
use App\Models\s_finacialreqdetail;
use App\Models\m_checkbook;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Main\MCheckbookController;
use App\Traits\ResponseTrait;

class SFinacialreqdetailController extends Controller
{
    use ResponseTrait;
    function justCreate($record, $fk_financialrequest)
    {
        $checkbookController = new MCheckbookController();

        if (isset(auth()->user()->id)) {
            try {
                if ($record['fk_financialpaymentmethod'] == 1) {
                    $check = $checkbookController->justCreate($record);
                }
                if ($record['fk_financialpaymentmethod'] == 4) {
                    $check = m_checkbook::findOrFail($record['fk_check']);
                }

                s_finacialreqdetail::create(
                    [
                        "fk_registrar" => auth()->user()->id,
                        "fk_financialrequest" => $fk_financialrequest,
                        "fk_check" => $check->pk_checkbook ?? null,
                        "fk_financialpaymentmethod" => $record['fk_financialpaymentmethod'],
                        "fk_moneybox" => !empty($record['fk_moneybox']) ? $record['fk_moneybox'] : null,
                        "fk_bankaccount" => !empty($record['fk_bankaccount']) ? $record['fk_bankaccount'] : null,
                        "price" => $record['price'],
                    ]
                );
                
            } catch (\Exception $e) {
                return $this->serverErrorResponse(__('messages.error.server') . ' ' . $e->getMessage());
            }
        }
    }
    function justUpdate($record, $fk_financialrequest)
    {
        $checkbookController = new MCheckbookController();

        if (isset(auth()->user()->id)) {
            try {
                if ($record['fk_financialpaymentmethod'] == 1) {
                    $check = $checkbookController->justUpdate($record);
                    $subcheck = s_finacialreqdetail::findOrFail($record['pk_finacialreqdetail']);
                    $subcheck->update([                       
                        "price" => $record['price'],
                    ]);
                }else{
                    s_finacialreqdetail::create(
                    [
                        "fk_registrar" => auth()->user()->id,
                        "fk_financialrequest" => $fk_financialrequest,
                        "fk_cheque" => $check->pk_checkbook ?? null,
                        "fk_financialpaymentmethod" => $record['fk_financialpaymentmethod'],
                        "fk_moneybox" => !empty($record['fk_moneybox']) ? $record['fk_moneybox'] : null,
                        "fk_bankaccount" => !empty($record['fk_bankaccount']) ? $record['fk_bankaccount'] : null,
                        "price" => $record['price'],
                    ]
                );
                }

            } catch (\Exception $e) {
                return $this->serverErrorResponse(__('messages.error.server') . ' ' . $e->getMessage());
            }
        }
    }
    function recordsForFinancialreq($fk_financialrequest)
    {

        $data = s_finacialreqdetail::select(
            's_finacialreqdetails.*',
            'm_checkbooks.*'
        )
            ->leftJoin('m_checkbooks', 's_finacialreqdetails.fk_check', '=', 'm_checkbooks.pk_checkbook')
            ->where('fk_financialrequest', $fk_financialrequest)
            ->get();
        return $data;
    }
    function deleteOldrecord($fk_financialrequest)
    {
        s_finacialreqdetail::
        where('fk_financialrequest', $fk_financialrequest)
        ->where('fk_financialpaymentmethod','!=',1)
        ->where('fk_financialpaymentmethod','!=',4)->delete();
    }
    function deleteAllrecords($fk_financialrequest)
    {
        s_finacialreqdetail::whereIn('fk_financialrequest', $fk_financialrequest)->delete();
    }
}
