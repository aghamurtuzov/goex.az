<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
	protected $guarded = [];

	public function balance()
	{
		return $this->belongsTo('App\Models\Balance', 'balance_id');
	}

	public function customOrder()
	{
		return $this->belongsTo('App\Models\Customer', 'customer_id');
	}

	public function sub_section()
	{
		return $this->belongsTo('App\Models\SubSection', 'subsection_id');
	}

	public function sack()
	{
		return $this->belongsTo('App\Models\Sack', 'sack_id');
	}

	public function confirmationOrder()
	{
		return $this->belongsTo('App\User', 'confirmation');
	}

	public function acceptedOrder()
	{
		return $this->belongsTo('App\User', 'accepted');
	}

	public function controlsOrder()
	{
		return $this->belongsTo('App\User', 'controls');
	}

	public function scopeType($query, $type)
	{
		return true;
	}

	public function scopeStock_type($query, $stock_type)
	{
		if ($stock_type != null) {
			return !$stock_type ? $query->where('subsection_id', '!=', null) : $query->where('sack_id', '!=', null);
		} else {
			return $query;
		}
	}

	public function scopeStock_id($query, $stock_id)
	{
		if ($stock_id != null) {
			return $query->where('stock_id', $stock_id);
		} else {
			return $query;
		}
	}


	public function scopeSack_id($query, $sack_id)
	{
		if ($sack_id != null) {
			return $query->where('sack_id', $sack_id);
		} else {
			return $query;
		}
	}

	public function scopeSection_id($query, $section_id)
	{
		if ($section_id != null) {
			return $query->where('section_id', $section_id);
		} else {
			return $query;
		}
	}

	public function scopeSubsection_id($query, $subsection_id)
	{
		if ($subsection_id != null) {
			return $query->where('subsection_id', $subsection_id);
		} else {
			return $query;
		}
	}

	public function scopeLink($query, $link)
	{
		if ($link != null) {
			return $query->where('link', $link);
		} else {
			return $query;
		}
	}

	public function scopeWidth($query, $width)
	{
		if ($width != null) {
			return $query->where('width', $width);
		} else {
			return $query;
		}
	}

	public function scopeLength($query, $length)
	{
		if ($length != null) {
			return $query->where('length', $length);
		} else {
			return $query;
		}
	}

	public function scopeDepth($query, $depth)
	{
		if ($depth != null) {
			return $query->where('depth', $depth);
		} else {
			return $query;
		}
	}


	public function scopeWeight($query, $weight)
	{
		if ($weight != null) {
			return $query->where('weight', $weight);
		} else {
			return $query;
		}
	}

	public function scopeProduct_company($query, $product_company)
	{
		if ($product_company != null) {
			return $query->where('product_company', $product_company);
		} else {
			return $query;
		}
	}

	public function scopeBarcode($query, $barcode)
	{
		if ($barcode != null) {
			return $query->where('barcode', $barcode);
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

	public function scopeDelivery_price($query, $delivery_price)
	{
		if ($delivery_price != null) {
			return $query->where('delivery_price', $delivery_price);
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

	public function scopeFollow_code($query, $follow_code)
	{
		if ($follow_code != null) {
			return $query->where('follow_code', 'LIKE', '%' . $follow_code . '%');
		} else {
			return $query;
		}
	}

	public function scopeCategory($query, $category)
	{
		if ($category != null) {
			return $query->where('category', $category);
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

	public function scopePassport($query, $passport)
	{
		if ($passport != null) {
			return $query->whereHas('customOrder', function ($q) use ($passport) {
				$q->where('passport', $passport);
			});
		} else {
			return $query;
		}
	}

	public function scopePhone($query, $phone)
	{
		if ($phone != null) {
			return $query->whereHas('customOrder', function ($q) use ($phone) {
				$q->where('phone', $phone);
			});
		} else {
			return $query;
		}
	}

	public function scopePublish_date($query, $publish_date)
	{
		if ($publish_date != null) {
			return $query->where('publish_date', '=', $publish_date);
		} else {
			return $query;
		}
	}


	public function scopePublish_date_begin($query, $publish_date_begin)
	{
		if ($publish_date_begin != null) {
			return $query->where('publish_date', '>=', $publish_date_begin);
		} else {
			return $query;
		}
	}

	public function scopeDay($query, $day)
	{
		if ($day != null) {
			return $query->whereDay('publish_date', $day);
		} else {
			return $query;
		}
	}

	public function scopeMonth($query, $month)
	{
		if ($month != null) {
			return $query->whereMonth('publish_date', $month);
		} else {
			return $query;
		}
	}

	public function scopeYear($query, $year)
	{
		if ($year != null) {
			return $query->whereYear('publish_date', $year);
		} else {
			return $query;
		}
	}


	public function scopePublish_date_end($query, $publish_date_end)
	{
		if ($publish_date_end != null) {
			return $query->where('publish_date', '<', $publish_date_end);
		} else {
			return $query;
		}
	}

	public function orderHistory()
	{

		return $this->hasMany('App\Models\OrderHistory', 'order_id');
	}

}
