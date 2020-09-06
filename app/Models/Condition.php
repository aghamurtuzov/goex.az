<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
	public function content()
	{
		$content = 'content_' . $this->locale;
		return $this->$content;
	}
}
