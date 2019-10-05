<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
	protected $guarded = [];

    public function usermac()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
