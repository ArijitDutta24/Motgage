<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = [
         'curr_name', 'curr_code', 'curr_rate', 'status'
    ];
}
