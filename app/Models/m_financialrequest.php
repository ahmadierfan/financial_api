<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_financialrequest extends Model
{

    protected $table = 'm_financialrequests';
    protected $primaryKey = 'pk_financialrequest';
    protected $guarded = [];
}
