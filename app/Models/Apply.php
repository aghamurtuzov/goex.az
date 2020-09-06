<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
	protected $guarded = [];

	public $timestamps = false;

	public function countryName()
	{
		return $this->belongsTo('App\Models\Country', 'country_id');
	}
}
