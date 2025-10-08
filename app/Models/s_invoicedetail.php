<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class s_invoicedetail extends Model
{

    protected $table = 's_invoicedetails';
    protected $primaryKey = 'pk_invoicedetail';
    protected $guarded = [];
}
