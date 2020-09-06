<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerCompany extends Model
{
    protected $table = 'customer_companies';

    protected $guarded = [];

    public $timestamps = false;

    public function userName()
    {
        return $this->belongsTo('App\User', 'user_id');
    }


}
