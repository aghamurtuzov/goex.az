<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalculateRequest;
use App\Models\Tariff;

class CalculateController extends Controller
{
	public function postCalculate(CalculateRequest $request)
	{
		$request->validated();

		$country_id = $request->get("country_id");
		$width = $request->get("width");
		$height = $request->get("height");
		$depth = $request->get("depth");
		$weight = $request->get("weight");
		$date = date('Y-m-d H:i:s');
		$time = explode(" ", $date)[1];
		$price = 0;

		if ($weight) {
			$tariff = Tariff::where('country_id', $country_id)->where('start_weight', '<=', $weight)->where('end_weight', '>', $weight)->first();
			if ($tariff) {
				$price = $weight * $tariff->price;
//				$companies = Company::where(['tariff_id' => $tariff->id, 'delete' => false])
//					->where('start_date', '<=', $date)
//					->where('end_date', '>=', $date)
//					->where('start_time', '<', $time)
//					->where('end_time', '>', $time)
//					->get();
			}
		}

		if ($width && $height && $depth) {
			$price_ = ($width * $height * $depth) / 6000;
			$price = $price_ > $price ? $price_ : $price;
		}


//		if (isset($companies) && $companies) {
//			foreach ($companies as $company) {
//				if ($company->is_fix_or_person) {
//					$price -= ($price * $company->discount) / 100;
//				} else {
//					$price -= $price * $company->discount;
//				}
//			}
//		}


		return response()->json(['status' => 'true', 'error' => '', 'success' => 200, 'price' => $price]);
	}
}
