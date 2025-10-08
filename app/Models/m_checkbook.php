<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_checkbook extends Model
{

    protected $table = 'm_checkbooks';
    protected $primaryKey = 'pk_checkbook';
    protected $guarded = [];
}
