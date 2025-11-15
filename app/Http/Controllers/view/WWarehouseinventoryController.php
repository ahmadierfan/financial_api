<?php

namespace App\Http\Controllers\view;

use Illuminate\Http\Request;
use App\Models\w_warehouseinventory;
use App\Models\b_warehousedoctype;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Main\MWarehouseController;
use App\Http\Controllers\Main\MProductController;
use App\Traits\ResponseTrait;

class WWarehouseinventoryController extends Controller
{
    use ResponseTrait;
    public function forCompany(Request $request)
    {
        $query = w_warehouseinventory::query()
            ->select('w_warehouseinventories.*')
            ->where('fk_company', auth()->user()->fk_company);


        // فیلتر محصول
        if ($request->filled('fk_product')) {
            $query->where('w_warehouseinventories.fk_product', $request->fk_product);
        }

        // فیلتر انبار
        if ($request->filled('fk_warehouse')) {
            $query->where('w_warehouseinventories.warehouse_id', $request->fk_warehouse);
        }

        return $query->get();
    }

    public function inventoryRequirment(Request $request,MWarehouseController $MWarehouse,MProductController $MProduct)
    {
        $warehouses = $MWarehouse->index();
        $products = $MProduct->index();
        $doctypes = b_warehousedoctype::get();

        $res = [
            "warehouses" => $warehouses,
            "products" => $products,
            "doctypes" => $doctypes,
            
        ];

        return $res;
    }
}
