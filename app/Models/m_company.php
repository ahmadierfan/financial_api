<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_company extends Model
{

    protected $table = 'b_companies';
    protected $primaryKey = "pk_company";
    protected $guarded = [];
}
