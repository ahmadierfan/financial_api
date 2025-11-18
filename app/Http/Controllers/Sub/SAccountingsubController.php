<?php

namespace App\Http\Controllers\Sub;

use App\Http\Controllers\Controller;

use App\Models\s_accountingsub;
use App\Traits\ResponseTrait;

class SAccountingsubController extends Controller
{
    use ResponseTrait;
    public function forCompany()
    {
        $accsub = s_accountingsub::select('*')
        ->join('users','s_accountingsubs.fk_registrar','=','users.id')
        ->where('users.fk_company',auth()->user()->fk_company)->get();
        return $accsub;
    }
    function addSubAccountingDoc($data, $request, $fk_accountingsubgreoup)
    {
        if (isset($request->typeOfSubAccount)) {
            $accountingsub = $request->accountingsub;

            if ($request->typeOfSubAccount == 1) {
                $data['fk_accountingsub'] = $this->creator($fk_accountingsubgreoup, $accountingsub);
                return $data;
            } else {
                if (isset($request->accountingsubcode)) {
                    $accountingsubcode = $request->accountingsubcode;
                    $checkNotExist = $this->checkNotExist($request);
                    if ($checkNotExist) {
                        $data['fk_accountingsub'] = $this->creator(11, $accountingsub, $accountingsubcode);
                        return $data;
                    } else
                        throw new \Exception(__('messages.error.repeated_subaccounting_doc_code'));
                } else
                    throw new \Exception(__('messages.error.accountingsubcode_not_set'));
            }
        }
        throw new \Exception(__('messages.error.accountingsubcode_type_not_set'));
    }
    function checkNotExist($request, $fk_accountingsub = null)
    {
        if (isset(auth()->user()->fk_company)) {
            $data = $request->validate([
                'accountingsubcode' => 'required',
            ]);
            $accountingsubcode = $data['accountingsubcode'];

            $query = s_accountingsub::where('accountingsubcode', $accountingsubcode)
                ->join('users', 's_accountingsubs.fk_registrar', '=', 'users.id')
                ->where('users.fk_company', auth()->user()->fk_company);

            if ($fk_accountingsub !== null)
                $query->where('pk_accountingsub', '!=', $fk_accountingsub);

            $data = $query->first();

            return !$data;
        }

    }
    function updateAuto($request)
    {
        $data = $request->validate([
            'fk_accountingsub' => 'required',
            'accountingsub' => 'nullable|string',
            'accountingsubcode' => 'nullable|integer',
        ]);

        $fk_accountingsub = $data['fk_accountingsub'];
        $accountingsub = $data['accountingsub'];
        $accountingsubcode = $data['accountingsubcode'];

        $checkNotExist = $this->checkNotExist($request, $fk_accountingsub);
        if ($checkNotExist) {
            $this->justUpdateCode($fk_accountingsub, $accountingsubcode, $accountingsub);
        } else
            throw new \Exception(__('messages.error.repeated_subaccounting_doc_code'));
    }
    function justUpdateCode($pk_accountingsub, $accountingsubcode, $accountingsub)
    {
        $this->isCorrectCompany(s_accountingsub::class,$pk_accountingsub);
        s_accountingsub::where('pk_accountingsub', $pk_accountingsub)
            ->update([
                'accountingsub' => $accountingsub,
                'accountingsubcode' => $accountingsubcode,
            ]);
    }
    function updateWithPk($pk_accountingsub, $accountingsubcode, $accountingsub)
    {
        $this->isCorrectCompany(s_accountingsub::class,$pk_accountingsub);
        s_accountingsub::where('pk_accountingsub', $pk_accountingsub)->update([
            "accountingsubcode" => $accountingsubcode,
            "accountingsub" => $accountingsub,
        ]);
    }
    function creator($fk_accountingsubgreoup, $accountingsub, $accountingsubcode = null)
    {
        if (isset(auth()->user()->id)) {
            $userid = auth()->user()->id;
            if ($accountingsubcode == null)
                $accountingsubcode = rand(1, 9999);

            $create = s_accountingsub::create(
                [
                    "fk_registrar" => $userid,
                    "fk_accountingsubgreoup" => $fk_accountingsubgreoup,
                    "accountingsub" => $accountingsub,
                    "accountingsubcode" => $accountingsubcode
                ]
            );

            if (isset($create->pk_accountingsub))
                return $create->pk_accountingsub;
        }

    }
}
