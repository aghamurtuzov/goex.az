<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sack extends Model
{

	public $timestamps = false;

	protected $guarded = [];

	public function StockName()
	{
		return $this->belongsTo('App\Models\Stock', 'stock_id');
	}

	public function orders()
	{
		return $this->hasMany('\App\Models\Orders', 'sack_id', 'id');
	}

	public function histories()
	{
		return $this->hasMany('\App\Models\SackHistory', 'sack_id', 'id');
	}

	public function user()
	{
		return $this->belongsTo('\App\User', 'user_id', 'id');
	}

	public function scopeStock_id($query, $stock_id)
	{
		if ($stock_id != null) {
			return $query->where('stock_id', $stock_id);
		} else {
			return $query;
		}
	}

	public function scopeName($query, $name)
	{
		if ($name != null) {
			return $query->where('name', 'LIKE', '%' . $name . '%');
		} else {
			return $query;
		}
	}

	public function scopeStatus($query, $status)
	{
		if ($status != null) {
			return $query->where('status', 'LIKE', '%' . $status . '%');
		} else {
			return $query;
		}
	}

	public function scopeStart_date($query, $start_date)
	{
		if ($start_date != null) {
			return $query->where('date', '>', $start_date);
		} else {
			return $query;
		}
	}

	public function scopeEnd_date($query, $end_date)
	{
		if ($end_date != null) {
			return $query->where('date', '=<', $end_date);
		} else {
			return $query;
		}
	}

	public function scopePosition($query, $position)
	{
		if ($position != null) {
			return $query->where('position', $position);
		} else {
			return $query;
		}
	}

}
