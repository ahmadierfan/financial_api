<?php

namespace App\Http\Controllers\Main;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Models\m_checkbook;
use App\Models\b_checkstatus;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Main\MBankaccountController;

class MCheckbookController extends Controller
{
    use ResponseTrait;
    public function justIndex($type)
    {
        if (isset(auth()->user()->fk_company)) {
            
            $checks = DB::table('m_checkbooks')
                ->select(
                    'm_checkbooks.*',
                    'm_checkbooks.checkprice as price',
                    'b_checkstatuses.checkstatus as status',
                    DB::raw("CONCAT(payeruser.name, ' ', payeruser.lastname) as payerfullname"),
                    DB::raw("CONCAT(receiveruser.name, ' ', receiveruser.lastname) as receiverfullname"),
                    DB::raw("CONCAT(users.name, ' ', users.lastname) as registrarfullname"),
                    DB::raw("pdate(substr( `m_checkbooks`.`created_at`, 1, 10 )) as jalalicheckdate"),
                    DB::raw("pdate(substr( `m_checkbooks`.`duedate`, 1, 10 )) as jalaliduedatedate"),
                    DB::raw('substr( `m_checkbooks`.`created_at`, 12, 5 ) AS `createdtime`'),
                    DB::raw("IF(TRIM(m_checkbooks.bank) = '' OR m_checkbooks.bank IS NULL, b_banks.bank, m_checkbooks.bank) AS bank"),
                )
                ->join('users', 'm_checkbooks.fk_registrar', '=', 'users.id')
                ->leftJoin('users as payeruser', 'm_checkbooks.fk_payer', '=', 'payeruser.id')
                ->leftJoin('users as receiveruser', 'm_checkbooks.fk_receiver', '=', 'receiveruser.id')
                ->leftJoin('m_bankaccounts', 'm_checkbooks.fk_checkbankaccount', '=', 'm_bankaccounts.pk_bankaccount')
                ->leftJoin('b_banks', 'm_bankaccounts.fk_bank', '=', 'b_banks.pk_bank')
                ->leftJoin('b_checkstatuses', 'm_checkbooks.fk_checkstatus', '=', 'b_checkstatuses.pk_checkstatus')
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
                "fk_checkstatus" => 1,
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
                    "fk_checkstatus" => !empty($record['fk_checkstatus']) ? $record['fk_checkstatus'] : 1,
                    "checkprice" => $record['price'],
                    "duedate" => $record['duedate'],
                ]
            );
           
        } 
        return $check;
    }
    public function justDelete($pks)
    {
        $this->isCorrectCompany(m_checkbook::class,$pks);
        m_checkbook::whereIn('pk_checkbook',$pks)->delete();
        return $this->successMessage();
    }
    public function forwardCheck($record)
    {
        $check = NULL;
        if ((isset($record['fk_check']) && !empty($record['fk_check']))) {
            $check = m_checkbook::findOrFail($record['fk_check']);


            $check->update(
                [
                    "fk_receiver" => !empty($record['fk_receiver']) ? $record['fk_receiver'] : null,
                    "fk_checkstatus" => 6,
                ]
            );
           
        } 
        return $check;

    }

    public function checkRequirment(Request $request,MBankaccountController $Mbankaccount,UserController $user)
    {
        $statuses = b_checkstatus::get();
        $bankaccounts = $Mbankaccount->forCompany();
        $users = $user->forCompany();
        $res = [
            "statuses" => $statuses,
            "bankaccounts" => $bankaccounts,
            "users" => $users,
        ];
        return $res;


    }

    public function receiveCheck()
    {
        return $this->justIndex(1);
    }

    public function paymentCheck()
    {
        return $this->justIndex(2);
    }

    public function updateReceiveCheck(Request $request)
    {
        $data = $request->validate([
            'pk_checkbook' => 'required|integer',
            'checknumber' => 'required|integer',
            'sayadnumber' => 'nullable|integer',
            'fk_payer' => 'required|integer',
            'fk_checkbankaccount' => 'required|integer',
            'price' => 'nullable|integer',
            'fk_receiver' => 'nullable|integer|max:255',
            'duedate' => 'nullable|date|max:255',
            'bank' => 'nullable|string|max:255',
            'branch' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'fk_checkstatus' => 'required|integer',
        ]);
        $check = $this->justUpdate($data);
        return $this->successMessage($check);

    }
    public function updatePaymentCheck(Request $request)
    {
        $data = $request->validate([
            'pk_checkbook' => 'required|integer',
            'checknumber' => 'required|integer',
            'sayadnumber' => 'nullable|integer',
            'fk_payer' => 'required|integer',
            'fk_checkbankaccount' => 'required|integer',
            'price' => 'nullable|integer',
            'fk_receiver' => 'nullable|integer|max:255',
            'duedate' => 'nullable|date|max:255',
            'bank' => 'nullable|string|max:255',
            'branch' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'fk_checkstatus' => 'required|integer',
        ]);
        $data['bank']='';
        $check = $this->justUpdate($data);
        return $this->successMessage($check);

    }
    public function deleteReceiveCheck(Request $request)
    {
        $data = $request->validate([
            'pk' => 'required|array',
            
        ]);
        $pk = $data['pk'];
        $this->justDelete($pk);
        return $this->successDelete();
    }
    public function deletePaymentCheck(Request $request)
    {
        $data = $request->validate([
            'pk' => 'required|array',
            
        ]);
        $pk = $data['pk'];
        $this->justDelete($pk);
        return $this->successDelete();
    }
}
