<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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

    public function rules()
    {
        return [
            "first_name"=>"required|string",
            "last_name"=>"required|string",
            "address_line_1"=>"required|string",
            "phone"=>"required|string",
            "country"=>"required|string",
            "city"=>"required|string",
            "status"=>"required",
            "district"=>"required|string",
            "street"=>"required|string",
            "passport_fin"=>"required",
            "province"=>"required",
            "receiver"=>"required|string",
            "status"=>"required",
        ];
    }


    public function messages()
    {
        return [
            "first_name.required" => "Ad sahəsi boş buraxıla bilməz!",
            "first_name.string" => "Ad sahəsi mətn olmalıdır!",
            "last_name.required" => "Soyad sahəsi boş buraxıla bilməz!",
            "last_name.string" => "Soyad sahəsi mətn olmalıdır!",
            "address_line_1.required" => "Address sahəsi boş buraxıla bilməz!",
            "address_line_1.string" => "Address  sahəsi mətn olmalıdır!",
            "phone.required" => "Telefon sahəsi boş buraxıla bilməz!",
            "phone.string" => "Telefon sahəsi mətn olmalıdır!",
            "country.required" => "Olke sahəsi boş buraxıla bilməz!",
            "country.string" => "Olke sahəsi mətn olmalıdır!",
            "city.required" => "Şəhər sahəsi boş buraxıla bilməz!",
            "city.string" => "Şəhər sahəsi mətn olmalıdır!",
            "district.required" => "Rayon sahəsi boş buraxıla bilməz!",
            "district.string" => "Rayon sahəsi mətn olmalıdır!",
            "street.required" => "Kuce sahəsi boş buraxıla bilməz!",
            "street.string" => "Kuce sahəsi mətn olmalıdır!",
            "passport_fin.required" => "Kuce sahəsi mətn olmalıdır!",
            "province.required" => "Kuce sahəsi mətn olmalıdır!",
            "receiver.required" => "Kuce sahəsi mətn olmalıdır!",
            "status.required" => "Status sahəsi boş buraxıla bilməz!",
        ];
    }
}
