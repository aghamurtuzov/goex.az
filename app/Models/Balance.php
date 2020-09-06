<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
	protected $table = 'balances';

	protected $guarded = [];

	public $timestamps = false;

	public function slug()
	{
		$slug = 'slug_' . $this->locale;
		return $this->$slug;
	}

	public function name()
	{
		$name = 'name_' . $this->locale;
		return $this->$name;
	}

	public function histories()
	{
		return $this->hasMany('App\Models\BalanceHistory', 'balance_id');
	}

	public function scopeName($query, $name)
	{
		if ($name != null) {
			return $query->where('name_az', 'LIKE', '%' . $name . '%');
		} else {
			return $query;
		}
	}

	public function scopeSlug($query, $slug)
	{
		if ($slug != null) {
			return $query->where('slug_az', 'LIKE', '%' . $slug . '%');
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

}
