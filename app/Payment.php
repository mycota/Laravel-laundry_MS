<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	protected $guarded = [];
	public function userpaymet()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function order()
    {
    	return $this->belongsTo(Order::class, 'order_id');
    }

    public function order_cust()
    {
    	return $this->belongsTo(Customer::class, 'customer_id');
    }
}
