<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

	protected $guarded = [];


	public function text()
	{
		$text = 'text_' . $this->locale;
		return $this->$text;
	}

	public function countryName()
	{
		return $this->belongsTo('App\Models\Country', 'country');
	}

	public function scopeFirst_Name($query, $first_name)
	{
		if ($first_name != null) {
			return $query->where('first_name', 'LIKE', '%' . $first_name . '%');
		} else {
			return $query;
		}
	}

	public function scopeLast_Name($query, $last_name)
	{
		if ($last_name != null) {
			return $query->where('last_name', 'LIKE', '%' . $last_name . '%');
		} else {
			return $query;
		}
	}

	public function scopeAddress($query, $address)
	{
		if ($address != null) {
			return $query->where('address_line_1', 'LIKE', '%' . $address . '%')
				->orWhere('address_line_2', 'LIKE', '%' . $address . '%');
		} else {
			return $query;
		}
	}

	public function scopeAddress_line_1($query, $address_line_1)
	{
		if ($address_line_1 != null) {
			return $query->where('address_line_1', 'LIKE', '%' . $address_line_1 . '%');
		} else {
			return $query;
		}
	}

	public function scopeAddress_line_2($query, $address_line_2)
	{
		if ($address_line_2 != null) {
			return $query->where('address_line_2', 'LIKE', '%' . $address_line_2 . '%');
		} else {
			return $query;
		}
	}

	public function scopeCountry($query, $country)
	{
		if ($country != null) {
			return $query->where('country', 'LIKE', '%' . $country . '%');
		} else {
			return $query;
		}
	}

	public function scopeCity($query, $city)
	{
		if ($city != null) {
			return $query->where('city', 'LIKE', '%' . $city . '%');
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

	public function scopePhone($query, $phone)
	{
		if ($phone != null) {
			return $query->where('phone', 'LIKE', '%' . $phone . '%');
		} else {
			return $query;
		}
	}

}
