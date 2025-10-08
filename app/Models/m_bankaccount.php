<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class m_bankaccount extends Model
{

    protected $table = 'm_bankaccounts';
    protected $primaryKey = 'pk_bankaccount';
    protected $guarded = [];
}
