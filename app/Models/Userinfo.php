<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    protected $fillable = [
        //'first_name', 'last_name', 'email', 'password', 'role_id',
        'user_id', 'address', 'city', 'postal_code', 'country_id'
    ];
}
