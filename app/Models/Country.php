<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    public $timestamps = false;

    protected $guarded = [];

    public function name()
    {
        $name = 'name_' . $this->locale;
        return $this->$name;
    }

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = strtolower($value);
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