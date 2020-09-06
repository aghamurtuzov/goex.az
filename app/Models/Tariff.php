<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    protected $table = 'tariffs';

    public $timestamps = false;

    protected $guarded = [];

    //get username
    public function userName()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    //get typeName
    public function typeName()
    {
        return !$this->type ? 'Digər' : 'Maye Məhsulları';
    }

    public function countryName()
    {
        return $this->belongsTo('App\Models\Country', 'country_id');
    }


    public function scopePrice($query, $price)
    {
        if ($price != null) {
            return $query->where('price', 'LIKE', '%' . $price . '%');
        } else {
            return $query;
        }
    }

    public function scopeCountry_id($query, $country_id)
    {
        if ($country_id != null) {
            return $query->where('country_id', $country_id);
        } else {
            return $query;
        }
    }

    public function scopeType($query, $type)
    {
        if ($type != null) {
            return $query->where('type', 'LIKE', '%' . $type . '%');
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
