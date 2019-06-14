<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Property extends Model
{
	

	
	
    protected $fillable = [
         'prop_name', 'catid', 'prop_desc', 'prop_country', 'prop_state', 'prop_city', 'prop_addr', 'prop_pincode', 'prop_price', 'user_id', 'created_by', 'status', 'endDate', 'endTime', 'picture'
    ];


    public function category()
    {
    	return $this->belongsTo('App\Models\Category', 'catid', 'id');
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function image()
    {
        return $this->hasMany('App\Models\PropertyImage', 'prop_id', 'id');
    }
}
