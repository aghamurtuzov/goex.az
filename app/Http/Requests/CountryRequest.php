<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "name_az" => "required|string",
            "name_ru" => "required|string",
            "name_en" => "required|string",
            "image" => "mimes:jpeg,jpg,png,gif|required|max:1000",
            "status" => "required",
        ];
    }


    public function messages()
    {
        return [
            "name_az.required" => "Name az sahəsi boş buraxıla bilməz!",
            "name_ru.required" => "Name ru sahəsi boş buraxıla bilməz!",
            "name_en.required" => "Name en sahəsi boş buraxıla bilməz!",
            "name_az.string" => "Name az sahəsi mətn ola bilməz!",
            "name_ru.string" => "Name ru sahəsi mətn ola bilməz!",
            "name_en.string" => "Name en sahəsi mətn ola bilməz!",
            "image.mimes"=>"Sekil formati duzgun deyil",
            "image.required"=>"Sekil sahəsi boş buraxıla bilməz!",
            "image.max"=>"Sekil olcusu 1mb dan cox ola bilmez!",
            "status.required" => "Status sahəsi boş buraxıla bilməz!",
        ];
    }
}
