<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TranslationGroup extends Model
{
    public function translations(){
        return $this->hasMany('\App\Models\Translation','group_id','id');
    }

	public function scopeName($query, $name)
	{
		if ($name != null) {
			return $query->where('name', 'LIKE', '%' . $name . '%');
		} else {
			return $query;
		}
	}
}
