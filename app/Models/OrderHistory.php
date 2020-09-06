<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    protected $guarded=[];

    public $timestamps=false;

    public function orderName(){
        return $this->belongsTo('App\Models\Orders','order_id');
    }

    public function userOrder()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
