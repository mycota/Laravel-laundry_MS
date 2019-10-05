<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $guarded = [];
	protected $table = 'orders';


    public function userorder()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function payments_order()
    {
        return $this->hasOne(Payment::class);
    }

    public function custorder()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
