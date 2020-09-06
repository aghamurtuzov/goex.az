<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	public function address()
	{
		$address = 'address_' . $this->locale;
		return $this->$address;
	}

	public function work_date()
	{
		$word_date = 'word_date_' . $this->locale;
		return $this->$word_date;
	}
}
