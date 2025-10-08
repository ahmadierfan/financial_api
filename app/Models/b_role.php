<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class b_role extends Model
{

    protected $table = 'b_roles';
    protected $primaryKey = "pk_role";
    protected $guarded = [];
}
