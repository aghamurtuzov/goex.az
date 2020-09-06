<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubSection extends Model
{
    protected $guarded = [];

    public $timestamps = false;


	public function orders()
	{
		return $this->hasMany('\App\Models\Orders', 'sack_id', 'id');
	}

	public function histories()
	{
		return $this->hasMany('\App\Models\SubSectionHistory', 'subsection_id', 'id');
	}

	public function user()
	{
		return $this->belongsTo('\App\User', 'user_id', 'id');
	}

    public function SectionName()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }


    public function scopeName($query, $name)
    {
        if ($name != null) {
            return $query->where('name', 'LIKE', '%' . $name . '%');
        } else {
            return $query;
        }
    }

	public function scopeCustomer_code($query, $customer_code)
	{
		if ($customer_code != null) {
			$customer = Customer::where('customer_code',$customer_code)->first();
			return $query->where('section_id', 'LIKE', '%' . $customer . '%');
		} else {
			return $query;
		}
	}
	public function scopePassport_fin($query, $passport_fin)
	{
		if ($passport_fin != null) {
			return $query->where('name', 'LIKE', '%' . $name . '%');
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

    public function scopeSection_id($query, $section_id)
    {
        if ($section_id != null) {
            return $query->where('section_id', $section_id);
        } else {
            return $query;
        }
    }
}
