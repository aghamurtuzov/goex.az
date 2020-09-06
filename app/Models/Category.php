<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use ModelTrait;

	protected $table = 'categories';

	public $timestamps = false;

	protected $guarded = [];


	public function name()
	{
		$name = 'name_' . $this->locale;
		return $this->$name;
	}


	public function scopeName($query, $name)
	{
		if ($name != null) {
			return $query->where('name_az', 'LIKE', '%' . $name . '%');
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


}
