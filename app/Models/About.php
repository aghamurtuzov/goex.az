<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
	public function content()
	{
		$content = 'content_' . $this->locale;
		return $this->$content;
	}

}
