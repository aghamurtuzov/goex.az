<?php

namespace App\Models;

use App\Http\Controllers\AuthSite\CustomerResetPasswordController;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Customer extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $guard = 'customers';

    public $timestamps = false;

    //get filialName
    public function filialName()
    {
        return $this->belongsTo('App\Models\Filial', 'filial_id');
    }

    public function customOrder()
    {

        return $this->hasMany('App\Models\Orders', 'customer_id');
    }

    public function balances()
    {
        return $this->belongsToMany('App\Models\Balance', 'customer_balance', 'customer_id', 'balance_id')->withPivot('amount');
    }

    public function balanceCustomer(){
        return $this->hasMany('App\Models\CustomerBalance','customer_id');
    }

    public function scopePhone($query, $phone)
    {
        if ($phone != null) {
            return $query->where('phone', 'LIKE', '%' . $phone . '%');
        } else {
            return $query;
        }
    }

    public function scopeFull_name($query, $full_name)
    {
        if ($full_name != null) {
            return $query->where(DB::raw('CONCAT(first_name," ",  last_name)'), 'LIKE', '%' . $full_name . '%');
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

    public function scopeFilial_id($query, $filial)
    {
        if ($filial != null) {
            return $query->where('filial_id', $filial);
        } else {
            return $query;
        }
    }

    public function scopeCustomer_code($query, $customer_code)
    {
        if ($customer_code != null) {
            return $query->where('customer_code', 'LIKE', '%' . $customer_code . '%');
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

    public function scopePassport($query, $passport)
    {
        if ($passport != null) {
            return $query->where('passport', 'LIKE', '%' . $passport . '%');
        } else {
            return $query;
        }
    }

    public function scopePassport_fin($query, $passport_fin)
    {
        if ($passport_fin != null) {
            return $query->where('passport_fin', 'LIKE', '%' . $passport_fin . '%');
        } else {
            return $query;
        }
    }

    public function scopeEmail($query, $email)
    {
        if ($email != null) {
            return $query->where('email', 'LIKE', '%' . $email . '%');
        } else {
            return $query;
        }
    }

    public function scopeSituation($query, $situation)
    {
        if ($situation != null) {
            if ($situation == 1) {
                $query->whereHas('customOrder', function ($q) use ($situation) {
                    $q->where('situation', $situation);
                });
            } elseif ($situation == 2) {
                $query->whereHas('customOrder', function ($q) use ($situation) {
                    $q->whereNotIn('situation', [5, 6, 7]);
                });
            } elseif ($situation == 3) {
                $query->doesntHave('customOrder');
            }
            return $query;
        } else {
            return $query;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
