<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerPrivateRequest extends FormRequest
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
            "passport"=>"required|string|max:8|min:8",
            "passport_fin"=>"required|string|max:7|min:7",
            "filial_id"=>"required",
            "address"=>"required",
        ];
    }

        public function messages()
    {
        return [
            "first_name.required" => "Ad  sahəsi boş buraxıla bilməz!",
            "first_name.string" => "Ad  sahəsi mətn olmalıdır!",
            "last_name.required" => "Soyad  sahəsi boş buraxıla bilməz!",
            "last_name.string" => "Soyad sahəsi mətn olmalıdır!",
            "phone.required" => "Telefon sahəsi boş buraxıla bilməz!",
            "passport.required" => "Passport sahəsi boş buraxıla bilməz!",
            "passport.max" => "Passport sahəsi 8 simvol olmalıdir!",
            "passport_fin.required" => "Passport Fin sahəsi boş buraxıla bilməz!",
            "passport_fin.max" => "Passport Fin sahəsi 7 simvol olmalıdir!",
            "filial_id.required" => "Filial sahəsi boş buraxıla bilməz!",
            "address.required" => "Ünvan sahəsi boş buraxıla bilməz!",
        ];
    }
}
