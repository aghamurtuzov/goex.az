<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'first_name', 'last_name', 'ip_address', 'date', 'status', 'phone', 'delete', 'email', 'password',
    ];

    public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }


    public function scopeFull_name($query, $full_name)
    {
        if ($full_name != null) {
            return $query->where(DB::raw('CONCAT(first_name," ",  last_name)'), 'LIKE', '%' . $full_name . '%');
        } else {
            return $query;
        }
    }

    public function scopeUsername($query, $username)
    {
        if ($username != null) {
            return $query->where('username', $username);
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
