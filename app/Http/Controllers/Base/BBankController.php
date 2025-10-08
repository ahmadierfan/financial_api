<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Models\b_bank;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BBankController extends Controller
{
    use ResponseTrait;

    public function createBank(Request $request)
    {
        if (isset($request->user()->id)) {
            $data = $request->validate([
                'bank' => 'required',
            ]);

            $bank = b_bank::create([
                'bank' => $data['bank'],
                'fk_registrar' => $request->user()->id,
            ]);

            return $this->successMessage($bank);
        }

    }

    public function forCompany(Request $request)
    {
        if (isset(auth()->user()->fk_company)) {
            $banks = DB::table('b_banks')
                ->select(
                    'b_banks.pk_bank',
                    'b_banks.bank',
                    DB::raw("CONCAT(users.name, ' ', users.lastname) as registrarfullname")
                )
                ->join('users', 'b_banks.fk_registrar', '=', 'users.id')
                ->where('users.fk_company', '=', auth()->user()->fk_company)
                ->get();

            return $banks;
        }

    }

    public function updateBank(Request $request)
    {
        try {
            $data = $request->validate([
                'pk_bank' => 'required',
                'bank' => 'required',
            ]);

            $pk = $data['pk_bank'];

            $this->isCorrectCompany(\App\Models\b_bank::class, [$pk]);

            $bank = b_bank::findOrFail($pk);

            $bank->update([
                'bank' => $data['bank'],
            ]);

            return response()->json($bank);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }

    public function deleteBank(Request $request)
    {
        try {
            if (isset($request->pk)) {
                $request->validate(['pk' => 'required']);
                $receivedPks = $request->pk;

                $this->isCorrectCompany(\App\Models\b_bank::class, $receivedPks);

                b_bank::whereIn('pk_bank', $receivedPks)->delete();

                return $this->successDelete();
            }

        } catch (\Illuminate\Database\QueryException $e) {
            throw $e;
        } catch (\Exception $e) {
            return $this->clientErrorResponse($e->getMessage());
        }

    }
}
