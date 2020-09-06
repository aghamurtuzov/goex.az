<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statement extends Model
{
    protected $guarded=[];
    public $timestamps=false;

    public function orderStatement(){
        return $this->belongsTo('App\Models\Orders','tracking_code');
    }


}
