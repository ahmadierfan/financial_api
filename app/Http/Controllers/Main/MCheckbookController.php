<?php

namespace App\Http\Controllers\Main;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use App\Models\m_checkbook;

class MCheckbookController extends Controller
{
    public function justIndex($type)
    {
        if (isset(auth()->user()->fk_company)) {
            $checks = DB::table('m_checkbooks')
                ->select(
                    'm_checkbooks.*',
                    'm_checkbooks.checkprice as price',
                    DB::raw("CONCAT(payeruser.name, ' ', payeruser.lastname) as payerfullname"),
                    DB::raw("CONCAT(receiveruser.name, ' ', receiveruser.lastname) as receiverfullname"),
                    DB::raw("CONCAT(users.name, ' ', users.lastname) as registrarfullname"),
                    DB::raw("pdate(substr( `m_checkbooks`.`created_at`, 1, 10 )) as jalalicheckdate"),
                    DB::raw("pdate(substr( `m_checkbooks`.`duedate`, 1, 10 )) as jalaliduedatedate"),
                    DB::raw('substr( `m_checkbooks`.`created_at`, 12, 5 ) AS `createdtime`'),
                    DB::raw("IF(m_checkbooks.bank = '' OR m_checkbooks.bank IS NULL, b_banks.bank, m_checkbooks.bank) AS bank"),
                )
                ->join('users', 'm_checkbooks.fk_registrar', '=', 'users.id')
                ->leftJoin('users as payeruser', 'm_checkbooks.fk_payer', '=', 'payeruser.id')
                ->leftJoin('users as receiveruser', 'm_checkbooks.fk_receiver', '=', 'receiveruser.id')
                ->leftJoin('m_bankaccounts', 'm_checkbooks.fk_checkbankaccount', '=', 'm_bankaccounts.pk_bankaccount')
                ->leftJoin('b_banks', 'm_bankaccounts.fk_bank', '=', 'b_banks.pk_bank')
                ->where('users.fk_company', '=', auth()->user()->fk_company)
                ->where('fk_financialrequesttype', $type)
                ->get();

            return $checks;
        }
    }
    public function justCreate($record)
    {
        $check = m_checkbook::create(
            [
                "fk_registrar" => auth()->user()->id,
                "fk_financialrequesttype" => $record['fk_financialrequesttype'],
                "bank" => $record['bank'],
                "branch" => $record['branch'],
                "description" => $record['description'],
                "fk_checkbankaccount" => !empty($record['fk_checkbankaccount']) ? $record['fk_checkbankaccount'] : null,
                "fk_payer" => !empty($record['fk_payer']) ? $record['fk_payer'] : null,
                "fk_receiver" => !empty($record['fk_receiver']) ? $record['fk_receiver'] : null,
                "checknumber" => $record['checknumber'],
                "sayadnumber" => $record['sayadnumber'],
                "checkprice" => $record['price'],
                "duedate" => $record['duedate'],
            ]
        );
        return $check;
    }
    public function justUpdate($record)
    {
        $check = NULL;
        if ((isset($record['pk_checkbook']) && !empty($record['pk_checkbook']))) {
            $check = m_checkbook::findOrFail($record['pk_checkbook']);


            $check->update(
                [

                    "bank" => $record['bank'],
                    "branch" => $record['branch'],
                    "description" => $record['description'],
                    "fk_checkbankaccount" => !empty($record['fk_checkbankaccount']) ? $record['fk_checkbankaccount'] : null,
                    "fk_payer" => !empty($record['fk_payer']) ? $record['fk_payer'] : null,
                    "fk_receiver" => !empty($record['fk_receiver']) ? $record['fk_receiver'] : null,
                    "checknumber" => $record['checknumber'],
                    "sayadnumber" => $record['sayadnumber'],
                    "checkprice" => $record['price'],
                    "duedate" => $record['duedate'],
                ]
            );
           
        } 
        return $check;
    }
    public function forwardCheck($record)
    {
        $check = NULL;
        if ((isset($record['fk_check']) && !empty($record['fk_check']))) {
            $check = m_checkbook::findOrFail($record['fk_check']);


            $check->update(
                [
                    "fk_receiver" => !empty($record['fk_receiver']) ? $record['fk_receiver'] : null,
                ]
            );
           
        } 
        return $check;

    }

    public function receiveCheck()
    {
        return $this->justIndex(1);
    }

    public function paymentCheck()
    {
        return $this->justIndex(2);
    }
}
