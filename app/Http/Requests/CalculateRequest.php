<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculateRequest extends FormRequest
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
			"height" => "numeric",
			"width" => "numeric",
			"depth" => "numeric",
			"weight" => "numeric",
			"country_id" => "required"
		];
	}

	public function messages()
	{
		return [
			"country_id.required" => "Ölkə sahəsi boş buraxıla bilməz!",
			"height.numeric" => "Hündürlüy sahəsi  rəqəm olmalıdır!",
			"width.numeric" => "En sahəsi  rəqəm olmalıdır!",
			"depth.numeric" => "Yandan sahəsi  rəqəm olmalıdır!",
			"weight.numeric" => "Çəki sahəsi  rəqəm olmalıdır!",
		];
	}
}
