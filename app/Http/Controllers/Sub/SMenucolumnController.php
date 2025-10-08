<?php

namespace App\Http\Controllers\Sub;

use App\Http\Controllers\Controller;

use App\Models\s_menucolumn;

use Illuminate\Http\Request;

class SMenucolumnController extends Controller
{
    function showForMenus(Request $request)
    {
        if (isset($request->id)) {
            $fk_menu = $request->id;

            $columns = s_menucolumn::where('fk_menu', $fk_menu)
                ->orderBy('ordernumber')
                ->get();

            return $columns;
        }
    }
}
