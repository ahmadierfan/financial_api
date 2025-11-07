<?php

namespace App\Http\Controllers\Base;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\b_financialpaymentmethods;

class BFinancialpaymentmethodController extends Controller
{
    public function getMethods(){
        return b_financialpaymentmethods::select('*')->get();
    }
}
