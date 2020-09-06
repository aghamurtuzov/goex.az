<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

	public $timestamps = false;

	protected $guarded = [];

	public function orders()
	{
		return $this->hasMany('\App\Models\Orders', 'stock_id', 'id');
	}

	public function sections()
	{
		return $this->hasMany('\App\Models\Section', 'stock_id', 'id');
	}

	public function countryName()
	{
		return $this->belongsTo('App\Models\Country', 'country_id');
	}

	public function cityName()
	{
		return $this->belongsTo('App\Models\City', 'city_id');
	}

	public function getOrders()
	{
		return Stock::join('sections as sec', 'stocks.id', 'sec.stock_id')
			->join('sub_sections as s_sec', 'sec.id', 's_sec.section_id')
			->join('orders as o', 's_sec.id', 'o.subsection_id')
			->join('customers as c', 'o.customer_id', 'c.id')
			->where([
				'stocks.id' => $this->id,
				'sec.status' => true,
				's_sec.status' => true
			])
			->select('o.*','c.customer_code','c.passport','c.first_name','c.last_name','sec.name as section','s_sec.name as sub_section')
			->paginate(20);
	}

	public function scopeCountry_id($query, $country_id)
	{
		if ($country_id != null) {
			return $query->where('country_id', $country_id);
		} else {
			return $query;
		}
	}

	public function scopeCity_id($query, $city_id)
	{
		if ($city_id != null) {
			return $query->where('city_id', $city_id);
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


	public function scopeAdress($query, $address)
	{
		if ($address != null) {
			return $query->where('address', 'LIKE', '%' . $address . '%');
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

	public function scopeDate($query, $date)
	{
		if ($date != null) {
			return $query->where('date', 'LIKE', '%' . $date . '%');
		} else {
			return $query;
		}

	}


	public function scopeType($query, $type)
	{
		if ($type != null) {
			return $query->where('type', $type);
		} else {
			return $query;
		}
	}


}
