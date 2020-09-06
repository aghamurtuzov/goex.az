<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $guarded = [];

    public $timestamps = false;

    public function userName()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function tariffName()
    {
        return $this->belongsTo('App\Models\Tariff', 'tariff_id');
    }


    public function scopeName($query, $name)
    {
        if ($name != null) {
            return $query->where('name', 'LIKE', '%' . $name . '%')
                ->orWhere('name', 'LIKE', '%' . $name . '%');
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
