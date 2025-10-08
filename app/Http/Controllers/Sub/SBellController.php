<?php

namespace App\Http\Controllers\Sub;

use App\Http\Controllers\Controller;

use App\Models\s_bell;
use Illuminate\Http\Client\Request;

class SBellController extends Controller
{
    function showBellForUserInCompany()
    {
        $data = s_bell::where('fk_company', auth()->user()->fk_company)
            ->whereNull("isseen")
            ->get();

        return $data;
    }
    function markReadBells()
    {
        $data = s_bell::where('fk_company', auth()->user()->company)
            ->update([
                "isseen" => 1
            ]);
    }
    function showForUserInCompany()
    {
        $data = s_bell::where('fk_company', auth()->user()->company)->get();

        return $data;
    }
    function justCreate($title, $mssage, $fk_company, $fk_user)
    {
        s_bell::create([
            "title" => $title,
            "message" => $mssage,
            "fk_company" => $fk_company,
            "fk_user" => $fk_user,
        ]);
    }
}
