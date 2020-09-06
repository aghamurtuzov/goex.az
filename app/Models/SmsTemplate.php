<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmsTemplate extends Model
{
    protected $table = 'sms_templates';
    protected $guarded = [];

    public function scopeMessage($query, $message)
    {
        if ($message != null) {
            return $query->where('message', 'LIKE', '%' . $message . '%');
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
