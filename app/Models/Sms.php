<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    protected $table = 'sms';

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
        return !$this->type ? 'Bütün' : 'Müştəri';
    }
    public function scopeMessage($query, $message)
    {
        if ($message != null) {
            return $query->where('message', 'LIKE', '%' . $message . '%');
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
