<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            "phone"=>"required",
            "wp"=>"required",
            "address_az"=>"required|string",
            "address_ru"=>"required|string",
            "address_en"=>"required|string",
            "address_tr"=>"required|string",
            "email"=>"required",
            "work_date_az"=>"required",
            "work_date_ru"=>"required",
            "work_date_en"=>"required",
            "work_date_tr"=>"required",
            "work_hour"=>"required",
            "status"=>"required",
        ];
    }

    public function messages()
    {
        return [
            "address_az.required" => "Address az sahəsi boş buraxıla bilməz!",
            "address_az.string" => "Address az sahəsi mətn olmalıdır!",
            "address_ru.required" => "Address ru sahəsi boş buraxıla bilməz!",
            "address_ru.string" => "Address ru sahəsi mətn olmalıdır!",
            "address_en.required" => "Address en sahəsi boş buraxıla bilməz!",
            "address_en.string" => "Address en sahəsi mətn olmalıdır!",
            "address_tr.required" => "Address tr sahəsi boş buraxıla bilməz!",
            "address_tr.string" => "Address tr sahəsi mətn olmalıdır!",
            "phone.required" => "Telefon sahəsi boş buraxıla bilməz!",
            "wp.required" => "Wp sahəsi boş buraxıla bilməz!",
            "email.string" => "Email sahəsi mətn olmalıdır!",
            "work_date_az.required" => "Is Gunleri sahəsi boş buraxıla bilməz!",
            "work_date_ru.required" => "Is Gunleri sahəsi boş buraxıla bilməz!",
            "work_date_en.required" => "Is Gunleri sahəsi boş buraxıla bilməz!",
            "work_date_tr.required" => "Is Gunleri sahəsi boş buraxıla bilməz!",
            "work_hour.required" => "Is Saati sahəsi boş buraxıla bilməz!",
            "status.required" => "Status sahəsi boş buraxıla bilməz!",
        ];
    }
}
