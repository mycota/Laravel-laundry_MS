<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cloth extends Model
{
	protected $guarded = [];
	
    public function usercloth()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
