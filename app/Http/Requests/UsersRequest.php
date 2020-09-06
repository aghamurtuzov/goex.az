<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            "username"=>"requried|string|",
            "first_name"=>"requried|string",
            "last_name"=>"required|string",
            "ip_address"=>"required|string",
//            "date"=>"required|date",
            "email"=>"required|email|unique",
            "phone"=>"required",
            "status"=>"required",
        ];
    }
    public function messages()
    {
        return [
            "username.required" => "Istifadeci sahəsi boş buraxıla bilməz!",
            "username.string" => "Istifadeci sahəsi mətn olmalıdır!",
            "first_name.required" => "Ad  sahəsi boş buraxıla bilməz!",
            "first_name.string" => "Ad sahəsi mətn olmalıdır!",
            "last_name.required" => "Soyad  sahəsi boş buraxıla bilməz!",
            "last_name.string" => "Soyad sahəsi mətn olmalıdır!",
            "ip_address.required" => "İp Unvan  sahəsi boş buraxıla bilməz!",
            "ip_address.string" => "İp Unvan sahəsi mətn olmalıdır!",
//            "date.required" => "Tarix  sahəsi boş buraxıla bilməz!",
//            "date.date" => "Tarix sahəsi tarix formatinda olmalıdır!",
            "email.required" => "Email  sahəsi boş buraxıla bilməz!",
            "email.email" => "Email sahəsi email formatinda olmalıdır!",
            "email.unique" => "Email sahəsi artıq istifadə olunub!",
            "phone.required" => "Telefon sahəsi  boş buraxıla bilməz!",
            "status.required" => "Status sahəsi boş buraxıla bilməz!",




        ];
    }
}
