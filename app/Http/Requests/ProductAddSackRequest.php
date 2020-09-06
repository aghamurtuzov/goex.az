<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddSackRequest extends FormRequest
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
			"barcode" => "required|max:14",
			"product_name" => "required|string",
			"product_company" => "required",
			"customer_code" => "required|max:15",
			"quantity" => "required|string",
			"product_price" => "required",
			"width" => "required",
			"length" => "required|string",
			"weight" => "required",
			"value" => "required",
			"product_type" => "required|string",
			"exchange" => "required",
			"sack_id" => "required",
			"status" => "required",
			"balance_id" => "required",
			"address_id" => "required"
		];
	}

	public function messages()
	{
		return [
			"barcode.required" => "Barkod sahəsi boş buraxıla bilməz!",
			"barcode.max" => "Barkod sahəsi max 14 simvol ola bilər!",
			"product_name.required" => "Product adı sahəsi boş buraxıla bilməz!",
			"product_company.string" => "Product şirkəti sahəsi mətn olmalıdır!",
			"customer_code.required" => "Müştəri kodu sahəsi boş buraxıla bilməz!",
			"customer_code.max" => "Müştəri kodu sahəsi max 15 simvol ola bilər!",
			"quantity.required" => "Miqdar sahəsi boş buraxıla bilməz!",
			"product_price.required" => "Product qiyməti sahəsi boş buraxıla bilməz!",
			"width.string" => "En sahəsi mətn olmalıdır!",
			"length.required" => "Uzunluq sahəsi boş buraxıla bilməz!",
			"weight.required" => "Çəki sahəsi boş buraxıla bilməz!",
			"value.required" => "Product dəyəri sahəsi boş buraxıla bilməz!",
			"product_type.string" => "Product tipi sahəsi mətn olmalıdır!",
			"exchange.required" => "Valyuta sahəsi boş buraxıla bilməz!",
			"sack_id.required" => "Çuval sahəsi boş buraxıla bilməz!",
			"status.required" => "Status sahəsi boş buraxıla bilməz!",
			"address_id.required" => "Unvan sahəsi boş buraxıla bilməz!",
			"balance_id.required" => "Balans sahəsi boş buraxıla bilməz!",
		];
	}
}
