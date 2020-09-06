<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            "first_name"=>"required|string",
            "last_name"=>"required|string",
            "phone"=>"required",
            "date_of_birth"=>"required|date",
            "gender"=>"required|boolean",
            "filial_id"=>"required",
            "address"=>"required",
            "discount"=>"required",
            "email" => "required",
            "status" => "",
            "balance_azn" => "",
            "balance_euro" => "",
            "balance_usd" => "",

        ];
    }

    public function messages()
    {
        return [
            "first_name.required" => "Ad sahəsi boş buraxıla bilməz!",
            "first_name.string" => "Ad sahəsi mətn olmalıdır!",
            "last_name.required" => "Soyad sahəsi boş buraxıla bilməz!",
            "last_name.string" => "Soyad sahəsi mətn olmalıdır!",
            "phone.required" => "Telefon sahəsi boş buraxıla bilməz!",
            "date_of_birth.required" => "Doğum Tarixi sahəsi boş buraxıla bilməz!",
            "gender.required" => "Cinsiyyət sahəsi boş buraxıla bilməz!",
            "address.required" => "Ünvan sahəsi boş buraxıla bilməz!",
            "filial_id.required" => "Filial sahəsi boş buraxıla bilməz!",
            "discount.required" => "Endirim sahəsi boş buraxıla bilməz!",
            "email.required" => "Email sahəsi boş buraxıla bilməz!",

        ];
    }

}


