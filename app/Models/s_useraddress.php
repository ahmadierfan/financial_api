<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class s_useraddress extends Model
{

    protected $table = 's_useraddresses';
    protected $primaryKey = 'pk_useraddress';
    protected $guarded = [];
}
