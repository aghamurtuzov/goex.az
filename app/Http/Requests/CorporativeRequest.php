<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CorporativeRequest extends FormRequest
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
            "passport"=>"required|string|max:8",
            "passport_fin"=>"required|string|max:7",
            "filial_id"=>"required",
            "address"=>"required",
            "discount"=>"required",
            "status"=>"",
            'email' => 'required|email',
            'company_name' => 'required|string',
            'account_number' => 'required',
            'balance_azn' => '',
            'balance_euro' => '',
            'balance_usd' => '',
        ];
    }

    public function messages()
    {
        return [
            "first_name.required" => "Ad  sahəsi boş buraxıla bilməz!",
            "first_name.string" => "Ad  sahəsi mətn olmalıdır!",
            "last_name.required" => "Soyad  sahəsi boş buraxıla bilməz!",
            "last_name.string" => "Soyad en sahəsi mətn olmalıdır!",
            "phone.required" => "Telefon sahəsi boş buraxıla bilməz!",
            "status.required" => "Status sahəsi boş buraxıla bilməz!",
            "date_of_birth.required" => "Doğum Tarixi sahəsi boş buraxıla bilməz!",
            "gender.required" => "Cinsiyyət sahəsi boş buraxıla bilməz!",
            "passport.required" => "Passport sahəsi boş buraxıla bilməz!",
            "passport_fin.required" => "Passport Fin sahəsi boş buraxıla bilməz!",
            "address.required" => "Ünvan sahəsi boş buraxıla bilməz!",
            "email.required" => "Email sahəsi boş buraxila bilməz!",
            "email.email" => "Email tipində olmalıdır!",
            "company_name.required" => "Şirkət adı sahəsi boş buraxila bilməz!",
            "company_name.string" => "Şirkət adı  sahəsi mətn olmalıdır!",
            "account_number.required" => "Hesab nömrəsi adı sahəsi boş buraxila bilməz!",
            "discount.required" => "Endirim sahəsi boş buraxıla bilməz!",
        ];
    }
}
