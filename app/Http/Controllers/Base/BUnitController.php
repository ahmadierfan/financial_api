<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;

use App\Models\b_unit;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BUnitController extends Controller
{
    use ResponseTrait;
    public function createUnit(Request $request)
    {
        if (isset($request->user()->id)) {
            $data = $request->validate([
                'unit' => 'required',
            ]);

            $unit = b_unit::create([
                'unit' => $data['unit'],
                'fk_registrar' => $request->user()->id,
            ]);
            return $this->successMessage($unit);
        }
    }

    public function forCompany()
    {
        if (isset(auth()->user()->fk_company)) {
            $units = DB::table('b_units')
                ->select(
                    'b_units.pk_unit',
                    'b_units.unit',
                    DB::raw("CONCAT(users.name, ' ', users.lastname) as registrarfullname")
                )
                ->join('users', 'b_units.fk_registrar', '=', 'users.id')
                ->where('users.fk_company', '=', auth()->user()->fk_company)
                ->get();

            return $units;
        }
    }
    public function updateUnit(Request $request)
    {
        try {
            $data = $request->validate([
                'pk_unit' => 'required',
                'unit' => 'required',
            ]);
            $pk = $data['pk_unit'];

            $this->isCorrectCompany(b_unit::class, [$pk]);

            $unit = b_unit::findOrFail($pk);

            $unit->update([
                'unit' => $data['unit'],
            ]);

            return response()->json($unit);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }

    public function deleteUnit(Request $request)
    {
        try {
            if (isset($request->pk)) {
                $request->validate([
                    'pk' => 'required',
                ]);
                $receivedPks = $request->pk;

                $this->isCorrectCompany(\App\Models\b_unit::class, $receivedPks);

                b_unit::whereIn('pk_unit', $receivedPks)->delete();

                return $this->successDelete();
            }
        } catch (\Illuminate\Database\QueryException $e) {
            throw $e;
        } catch (\Exception $e) {
            return $this->clientErrorResponse($e->getMessage());
        }


    }
}
