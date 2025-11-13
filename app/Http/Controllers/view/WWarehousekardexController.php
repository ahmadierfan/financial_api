<?php

namespace App\Http\Controllers\view;

use Illuminate\Http\Request;
use App\Models\w_warehousekardex;
use App\Models\b_warehousedoctype;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Main\MWarehouseController;
use App\Http\Controllers\Main\MProductController;
use App\Traits\ResponseTrait;
class WWarehousekardexController extends Controller
{
    use ResponseTrait;
    public function forCompany(Request $request)
    {
        $query = w_warehousekardex::query()
            ->select('w_warehousekardexes.*')
            ->join('users', 'w_warehousekardexes.fk_registrar', '=', 'users.id')
            ->where('users.fk_company', auth()->user()->fk_company);

        // فیلتر نوع سند
        if ($request->filled('fk_warehousedoctype')) {
            $query->where('w_warehousekardexes.fk_warehousedoctype', $request->fk_warehousedoctype);
        }

        // فیلتر محصول
        if ($request->filled('fk_product')) {
            $query->where('w_warehousekardexes.fk_product', $request->fk_product);
        }

        // فیلتر انبار
        if ($request->filled('fk_warehouse')) {
            $query->where('w_warehousekardexes.fk_warehouse', $request->fk_warehouse);
        }

        // فیلتر بازه زمانی
        if ($request->filled('from_date') && $request->filled('to_date')) {
            $query->whereBetween('w_warehousekardexes.created_at', [$request->from_date, $request->to_date]);
        } elseif ($request->filled('from_date')) {
            $query->whereDate('w_warehousekardexes.created_at', '>=', $request->from_date);
        } elseif ($request->filled('to_date')) {
            $query->whereDate('w_warehousekardexes.created_at', '<=', $request->to_date);
        }

        // فیلتر توضیحات
        if ($request->filled('description')) {
            $query->where('w_warehousekardexes.description', 'like', "%{$request->description}%");
        }

        // مرتب‌سازی
        $query->orderBy('w_warehousekardexes.created_at', 'desc');

        return $query->get();
    }

    public function kardexRequirment(Request $request,MWarehouseController $MWarehouse,MProductController $MProduct)
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
