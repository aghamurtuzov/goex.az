<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalanceHistory extends Model
{
	protected $guarded = [];

	public $timestamps = false;

	public function order()
	{
		return $this->belongsTo('App\Models\Orders', 'order_id');
	}

	public function balance()
	{
		return $this->belongsTo('App\Models\Balance', 'balance_id');
	}

	public function customer()
	{
		return $this->belongsTo('App\Models\Customer', 'customer_id');
	}

	public function user()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public function scopeCustomer_id($query, $customer_id)
	{
		if ($customer_id != null) {
			return $query->where('customer_id', $customer_id);
		} else {
			return $query;
		}
	}

	public function scopeUser_id($query, $user_id)
	{
		if ($user_id != null) {
			return $query->where('user_id', $user_id);
		} else {
			return $query;
		}
	}

	public function scopeContent($query, $content)
	{
		if ($content != null) {
			return $query->where('content', 'LIKE', '%' . $content . '%');
		} else {
			return $query;
		}
	}

	public function scopePrice($query, $price)
	{
		if ($price != null) {
			return $query->where('price', $price);
		} else {
			return $query;
		}
	}

	public function scopeStatus($query, $status)
	{
		if ($status != null) {
			return $query->where('status', $status);
		} else {
			return $query;
		}
	}

}
