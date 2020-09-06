<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SackRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			"name" => "required",
			"stock_id" => "required|string",
			"status" => "required",
		];
	}

	public function messages()
	{
		return [
			"name.required" => "Ad sahəsi boş buraxıla bilməz!",
			"stock_id.required" => "Stock sahəsi boş buraxıla bilməz!",
			"stock_id.string" => "Stock sahəsi mətn olmalıdır!",
			"status.required" => "Status sahəsi boş buraxıla bilməz!",
		];
	}
}
