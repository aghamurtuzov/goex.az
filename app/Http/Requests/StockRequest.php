<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "country_id"=>"required",
            "city_id"=>"required",
            "name"=>"required|string",
            "address"=>"required|string",
            "phone_1"=>"required",
            "status"=>"required",
        ];
    }

    public function messages()
    {
        return [
            "country_id.required" => "Ölkə sahəsi boş buraxıla bilməz!",
            "city_id.required" => "Şəhər sahəsi boş buraxıla bilməz!",
            "name.required" => "Ad sahəsi boş buraxıla bilməz!",
            "name.string" => "Ad sahəsi mətn olmalıdır!",
            "address.required" => "Ünvan sahəsi boş buraxıla bilməz!",
            "address.string" => "Ünvan sahəsi mətn olmalıdır!",
            "phone_1.required" => "Telefon sahəsi boş buraxıla bilməz!",
            "status.required" => "Status sahəsi boş buraxıla bilməz!",
        ];
    }
}
