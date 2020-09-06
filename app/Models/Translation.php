<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
	public function group()
	{
		return $this->belongsTo('\App\Models\TranslationGroup', 'group_id', 'id');
	}

	public function scopeGroup_id($query, $group_id)
	{
		if ($group_id != null) {
			return $query->where('group_id', $group_id);
		} else {
			return $query;
		}
	}

	public function scopeKey($query, $key)
	{
		if ($key != null) {
			return $query->where('key', 'LIKE', '%' . $key . '%');
		} else {
			return $query;
		}
	}

}
