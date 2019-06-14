<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $fillable = [
         'cat_name', 'cat_slug', 'parent_id', 'parent_type'
    ];
}
