<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class b_api extends Model
{
    protected $table = 'b_apis';
    protected $primaryKey = "pk_api";
    protected $guarded = [];
}
