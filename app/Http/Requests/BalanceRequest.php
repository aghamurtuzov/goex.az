<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BalanceRequest extends FormRequest
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
            "name_az"=>"required|string",
            "name_ru"=>"required|string",
            "name_en"=>"required|string",
			"slug_az"=>"required|string",
			"slug_ru"=>"required|string",
			"slug_en"=>"required|string",
        ];
    }

    public function messages()
    {
        return [
            "name_az.required" => "Ad az sahəsi boş buraxıla bilməz!",
            "name_az.string" => "Ad az sahəsi mətn Olmalidir!",
            "name_ru.required" => "Ad ru sahəsi boş buraxıla bilməz!",
            "name_ru.string" => "Ad ru sahəsi mətn Olmalidir!",
            "name_en.required" => "Ad en sahəsi Boş buraxıla bilməz!",
            "name_en.string" => "Ad en sahəsi mətn Olmalidir!",
			"slug_az.required" => "Ad az sahəsi boş buraxıla bilməz!",
			"slug_az.string" => "Ad az sahəsi mətn Olmalidir!",
			"slug_ru.required" => "Ad ru sahəsi boş buraxıla bilməz!",
			"slug_ru.string" => "Slug ru sahəsi mətn Olmalidir!",
			"slug_en.required" => "Slug en sahəsi Boş buraxıla bilməz!",
			"slug_en.string" => "Slug en sahəsi mətn Olmalidir!",
        ];
    }
}
