<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderLink extends Model
{
	protected $guarded = [];


	public function customName()
	{
		return $this->belongsTo('App\Models\Customer', 'customer_id');
	}

	public function scopeType($query, $type)
	{
		return true;
	}

	public function scopeLink($query, $link)
	{
		if ($link != null) {
			return $query->where('link', $link);
		} else {
			return $query;
		}
	}

	public function scopeColor($query, $color)
	{
		if ($color != null) {
			return $query->where('color', 'LIKE', '%' . $color . '%');
		} else {
			return $query;
		}
	}


	public function scopeProduct_name($query, $product_name)
	{
		if ($product_name != null) {
			return $query->where('product_name', 'LIKE', '%' . $product_name . '%');
		} else {
			return $query;
		}
	}

	public function scopeSituation($query, $situation)
	{
		if ($situation != null) {
			return $query->where('situation', $situation);
		} else {
			return $query;
		}
	}

	public function scopeProduct_price($query, $product_price)
	{
		if ($product_price != null) {
			return $query->where('product_price', $product_price);
		} else {
			return $query;
		}
	}
	public function scopeDescription($query, $description)
	{
		if ($description != null) {
			return $query->where('description', 'LIKE', '%' . $description . '%');
		} else {
			return $query;
		}
	}

	public function scopeKargo_price($query, $kargo_price)
	{
		if ($kargo_price != null) {
			return $query->where('kargo_price', $kargo_price);
		} else {
			return $query;
		}
	}

	public function scopeCustomer_code($query, $customer_code)
	{
		if ($customer_code != null) {
			return $query->whereHas('customOrder', function ($q) use ($customer_code) {
				$q->where('customer_code', $customer_code);
			});
		} else {
			return $query;
		}
	}


	public function scopeDate($query, $date)
	{
		if ($date != null) {
			return $query->where('date', '=', $date);
		} else {
			return $query;
		}
	}


}
