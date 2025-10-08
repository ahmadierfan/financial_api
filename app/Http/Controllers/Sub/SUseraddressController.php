<?php

namespace App\Http\Controllers\Sub;

use App\Http\Controllers\Controller;

use App\Models\s_useraddress;
use Illuminate\Http\Request;

class SUseraddressController extends Controller
{
    function userAddress(Request $request)
    {
        if (isset($request->fk_user)) {
            $request->validate([
                'fk_user' => 'required|integer'
            ]);
            $fk_user = $request->fk_user;

            $data = s_useraddress::where('fk_user', $fk_user)
                ->get();

            return $data;
        }
    }
}
