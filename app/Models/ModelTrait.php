<?php

namespace App\Models;

trait ModelTrait
{



    //start scope
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
