<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\Country;

class AppliesController extends Controller
{

	public function getApplies()
	{
		$countries = Country::where('delete', false)->get();

		$results = Apply::where('status', true)->paginate(20);

		return view('admin.apply.apply', ['results' => $results, 'countries' => $countries]);
	}


}
