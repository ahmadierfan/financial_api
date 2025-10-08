<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sub\SAccountingsubController;
use App\Models\m_warehouse;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MWarehouseController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        if (isset(auth()->user()->fk_company)) {

            $warehouses = DB::table('m_warehouses')
                ->select(
                    'm_warehouses.pk_warehouse',
                    'm_warehouses.warehouse',
                    'm_warehouses.fk_user',
                    'm_warehouses.warehousesec',
                    'm_warehouses.warehousecode',
                    'm_warehouses.phone',
                    'm_warehouses.address',
                    'm_warehouses.isactive',
                    'm_warehouses.isenable',
                    'm_warehouses.fk_accountingsub',
                    DB::raw("CONCAT(registrar.name, ' ', registrar.lastname) as registrarfullname"),
                    's_accountingsubs.accountingsubcode',
                    's_accountingsubs.accountingsub',
                    DB::raw("CONCAT(users.name, ' ', users.lastname) as userfullname"),
                )
                ->join('users as registrar', 'm_warehouses.fk_registrar', '=', 'registrar.id')
                ->join('users', 'm_warehouses.fk_user', '=', 'users.id')
                ->leftJoin('s_accountingsubs', 'm_warehouses.fk_accountingsub', '=', 's_accountingsubs.pk_accountingsub')
                ->where('users.fk_company', '=', auth()->user()->fk_company)
                ->get();

            return $warehouses;
        }
    }

    public function createWarehouse(Request $request, SAccountingsubController $SAccountingsub)
    {
        DB::beginTransaction();

        try {
            $data = $request->validate([
                'warehouse' => 'required|string|max:255',
                'fk_user' => 'nullable',
                'warehousesec' => 'nullable|string|max:255',
                'warehousecode' => 'nullable|string|max:50',
                'phone' => 'nullable|string|max:50',
                'address' => 'nullable|string|max:500',
                'isactive' => 'nullable|boolean',
            ]);

            $data = $SAccountingsub->addSubAccountingDoc($data, $request, 12);

            $finaldata = $this->addRegistrar($data);

            $warehouse = m_warehouse::create($finaldata);

            DB::commit();
            return $this->successMessage($warehouse);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }

    public function updateWarehouse(Request $request, SAccountingsubController $SAccountingsub)
    {
        try {
            $data = $request->validate([
                'pk_warehouse' => 'required|integer',
                'warehouse' => 'required|string|max:255',
                'fk_user' => 'nullable',
                'warehousesec' => 'nullable|string|max:255',
                'warehousecode' => 'nullable|string|max:50',
                'phone' => 'nullable|string|max:50',
                'address' => 'nullable|string|max:500',
                'isactive' => 'nullable|boolean',
            ]);

            $pk = $data['pk_warehouse'];

            $this->isCorrectCompany(m_warehouse::class, [$pk]);

            $SAccountingsub->updateAuto($request);

            $warehouse = m_warehouse::findOrFail($pk);

            $warehouse->update($data);

            return response()->json($warehouse);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->serverErrorResponse($e->getMessage());
        }
    }

    public function deleteWarehouse(Request $request)
    {
        try {
            $request->validate([
                'pk' => 'required|array',
            ]);
            if (isset($request->pk)) {
                $pk = $request->pk;

                $this->isCorrectCompany(m_warehouse::class, $pk);

                m_warehouse::whereIn('pk_warehouse', $pk)->delete();

                return $this->successDelete();
            }
        } catch (\Illuminate\Database\QueryException $e) {
            throw $e;
        } catch (\Exception $e) {
            return $this->clientErrorResponse($e->getMessage());
        }
    }
}
