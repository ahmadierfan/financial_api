<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Sub\SAccountingsubController;

use App\Http\Controllers\Controller;
use App\Models\m_moneybox;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MMoneyboxController extends Controller
{
    use ResponseTrait;
    public function forCompany(Request $request)
    {
        if (isset(auth()->user()->fk_company)) {
            $moneyboxes = DB::table('m_moneyboxes')
                ->select(
                    'm_moneyboxes.pk_moneybox',
                    'm_moneyboxes.moneybox',
                    'm_moneyboxes.fk_accountingsub',
                    DB::raw("CONCAT(users.name, ' ', users.lastname) as registrarfullname"),
                    's_accountingsubs.accountingsubcode',
                    's_accountingsubs.accountingsub'
                )
                ->join('users', 'm_moneyboxes.fk_registrar', '=', 'users.id')
                ->leftjoin('s_accountingsubs', 'm_moneyboxes.fk_accountingsub', '=', 's_accountingsubs.pk_accountingsub')
                ->where('users.fk_company', '=', auth()->user()->fk_company)
                ->get();

            return $moneyboxes;
        }

    }

    public function createMoneybox(Request $request, SAccountingsubController $SAccountingsub)
    {
        DB::beginTransaction();

        try {
            $data = $request->validate([
                'moneybox' => 'required',
            ]);

            $data = $SAccountingsub->addSubAccountingDoc($data, $request, 11);

            $finaldata = $this->addRegistrar($data);

            $moneybox = m_moneybox::create($finaldata);

            DB::commit();
            return $this->successMessage($moneybox);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }

    }


    public function updateMoneybox(Request $request, SAccountingsubController $SAccountingsub)
    {
        try {
            $data = $request->validate([
                'pk_moneybox' => 'required',
                'moneybox' => 'required',
            ]);

            $pk = $data['pk_moneybox'];

            $this->isCorrectCompany(\App\Models\m_moneybox::class, [$pk]);

            $SAccountingsub->updateAuto($request);

            $moneybox = m_moneybox::findOrFail($pk);

            $moneybox->update([
                'moneybox' => $data['moneybox'],
            ]);

            return response()->json($moneybox);

        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }

    public function deleteMoneybox(Request $request)
    {
        try {
            $request->validate([
                'pk' => 'required',
            ]);

            if (isset($request->pk)) {
                $pk = $request->pk;

                $this->isCorrectCompany(\App\Models\m_moneybox::class, [$pk]);

                m_moneybox::whereIn('pk_moneybox', $pk)->delete();

                return $this->successDelete();
            }

        } catch (\Illuminate\Database\QueryException $e) {
            throw $e;
        } catch (\Exception $e) {
            return $this->clientErrorResponse($e->getMessage());
        }

    }
}
