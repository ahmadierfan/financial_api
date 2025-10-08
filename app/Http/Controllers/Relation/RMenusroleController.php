<?php

namespace App\Http\Controllers\Relation;
;

use App\Http\Controllers\Controller;

use App\Models\r_menusrole;
use Illuminate\Http\Request;

class RMenusroleController extends Controller
{
    function create(Request $request)
    {
        $request->validate([
            'roleId' => 'required',
            'menuId' => 'required',
        ]);

        if (isset(auth()->user()->id) && isset($request->roleId) && isset($request->menuId)) {
            $fk_menu = $request->menuId;
            $fk_role = $request->roleId;

            if ($this->checkNotExist($fk_menu, $fk_role)) {
                r_menusrole::create([
                    'fk_role' => $fk_role,
                    'fk_menu' => $fk_menu,
                    'fk_registrar' => auth()->user()->id,
                ]);
            }
        }
    }
    function delete(Request $request)
    {
        if (isset($request->menuId) && isset($request->roleId)) {
            $fk_menu = $request->menuId;
            $fk_role = $request->roleId;

            r_menusrole::where('fk_menu', $fk_menu)
                ->where('fk_role', $fk_role)
                ->delete();
        }
    }
    function checkNotExist($fk_menu, $fk_role)
    {
        $data = r_menusrole::where('fk_menu', $fk_menu)
            ->where('fk_role', $fk_role)
            ->first();

        if (isset($data->fk_menu))
            return false;
        return true;
    }
    function roleMenus(Request $request)
    {
        if (isset($request->id)) {
            $fk_role = $request->id;
            $data = r_menusrole::select('b_menus.menu', 'b_menus.pk_menu', 'r_menusroles.fk_role')
                ->join('b_menus', 'b_menus.pk_menu', '=', 'r_menusroles.fk_menu')
                ->where('fk_role', $fk_role)
                ->get();

            return $data;
        }
    }
}
