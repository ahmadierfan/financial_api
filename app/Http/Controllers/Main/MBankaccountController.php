<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sub\SAccountingsubController;
use App\Models\m_bankaccount;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MBankaccountController extends Controller
{
    use ResponseTrait;

    public function forCompany()
    {
        if (isset(auth()->user()->fk_company)) {
            $bankAccounts = DB::table('m_bankaccounts')
                ->select(
                    'm_bankaccounts.pk_bankaccount',
                    'm_bankaccounts.bankaccount',
                    'm_bankaccounts.fk_bank',
                    'm_bankaccounts.cardnumber',
                    'm_bankaccounts.accountnumber',
                    'm_bankaccounts.bankaccountowner',
                    'm_bankaccounts.iban',
                    'm_bankaccounts.fk_accountingsub',
                    's_accountingsubs.accountingsubcode',
                    's_accountingsubs.accountingsub',
                    DB::raw("CONCAT(users.name, ' ', users.lastname) as registrarfullname"),
                    'b_banks.bank'
                )
                ->join('b_banks', 'm_bankaccounts.fk_bank', '=', 'b_banks.pk_bank')
                ->leftjoin('s_accountingsubs', 'm_bankaccounts.fk_accountingsub', '=', 's_accountingsubs.pk_accountingsub')
                ->join('users', 'm_bankaccounts.fk_registrar', '=', 'users.id')
                ->where('users.fk_company', '=', auth()->user()->fk_company)
                ->get();

            return $bankAccounts;
        }

    }

    public function createBankAccount(Request $request, SAccountingsubController $SAccountingsub)
    {
        DB::beginTransaction();

        try {
            $data = $request->validate([
                'fk_bank' => 'required',
                'bankaccount' => '',
                'cardnumber' => '',
                'accountnumber' => '',
                'bankaccountowner' => '',
                'iban' => '',
            ]);

            $data = $SAccountingsub->addSubAccountingDoc($data, $request, 1);

            $finaldata = $this->addRegistrar($data);

            $bankaccount = m_bankaccount::create($finaldata);

            DB::commit();
            return $this->successMessage($bankaccount);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }

    public function updateBankAccount(Request $request, SAccountingsubController $SAccountingsub)
    {
        try {
            $data = $request->validate([
                'pk_bankaccount' => 'required',
                'fk_bank' => 'required',
                'bankaccount' => '',
                'cardnumber' => '',
                'accountnumber' => '',
                'bankaccountowner' => '',
                'iban' => '',
            ]);

            $pk = $data['pk_bankaccount'];

            $this->isCorrectCompany(m_bankaccount::class, [$pk]);

            $SAccountingsub->updateAuto($request);

            $bankAccount = m_bankaccount::findOrFail($pk);

            $bankAccount->update([
                'fk_bank' => $data['fk_bank'],
                'bankaccount' => $data['bankaccount'],
                'cardnumber' => $data['cardnumber'],
                'accountnumber' => $data['accountnumber'],
                'bankaccountowner' => $data['bankaccountowner'],
                'iban' => $data['iban'],
            ]);

            return $this->successMessage($bankAccount);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }
    public function deleteBankAccount(Request $request)
    {
        try {
            $request->validate([
                'pk' => 'required',
            ]);

            if (isset($request->pk)) {
                $pk = $request->pk;

                $this->isCorrectCompany(m_bankaccount::class, $pk);

                m_bankaccount::whereIn('pk_bankaccount', $pk)->delete();

                return $this->successDelete();
            }

        } catch (\Illuminate\Database\QueryException $e) {
            throw $e;
        } catch (\Exception $e) {
            return $this->clientErrorResponse($e->getMessage());
        }
    }
}
