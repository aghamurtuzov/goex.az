<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{

	protected $guarded = [];

	public function title()
	{
		$title = 'title_' . $this->locale;
		return $this->$title;
	}

	public function content()
	{
		$content = 'content_' . $this->locale;
		return $this->$content;
	}

	public function scopeTitle($query, $title)
	{
		if ($title != null) {
			return $query->where('title_az', 'LIKE', '%' . $title . '%');
		} else {
			return $query;
		}
	}


	public function scopeView($query, $view)
	{
		if ($view != null) {
			return $query->where('view', 'LIKE', '%' . $view . '%');
		} else {
			return $query;
		}
	}


	public function scopeCategory($query, $category)
	{
		if ($category != null) {
			return $query->where('category', 'LIKE', '%' . $category . '%');
		} else {
			return $query;
		}
	}

	public function scopeContent($query, $content)
	{
		if ($content != null) {
			return $query->where('content_az', 'LIKE', '%' . $content . '%');
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


	public function scopeDate($query, $date)
	{
		if ($date != null) {
			return $query->where('date', '>', $date);
		} else {
			return $query;
		}

	}

	public function scopeDate_Between($query, $date_between)
	{
		if ($date_between != null) {
			return $query->where('date_between', '=<', $date_between);
		} else {
			return $query;
		}

	}
}
