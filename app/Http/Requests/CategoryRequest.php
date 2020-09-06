<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            "name_az" => "required|string",
            "name_ru" => "required|string",
            "name_en" => "required|string",
            "name_tr" => "required|string",
            "status" => "required",
        ];
    }

    public function messages()
    {
        return [
            "name_az.required" => "Name az sahəsi boş buraxıla bilməz!",
            "name_ru.required" => "Name ru sahəsi boş buraxıla bilməz!",
            "name_en.required" => "Name en sahəsi boş buraxıla bilməz!",
            "name_tr.required" => "Name tr sahəsi boş buraxıla bilməz!",
            "name_az.string" => "Name az sahəsi mətn ola bilməz!",
            "name_ru.string" => "Name ru sahəsi mətn ola bilməz!",
            "name_en.string" => "Name en sahəsi mətn ola bilməz!",
            "name_tr.string" => "Name tr sahəsi mətn ola bilməz!",
            "status.required" => "Status sahəsi boş buraxıla bilməz!",
        ];
    }
}
