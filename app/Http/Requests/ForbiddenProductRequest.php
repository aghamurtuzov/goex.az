<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForbiddenProductRequest extends FormRequest
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
            "name_en"=>"required|string",
            "name_ru"=>"required|string",
            "name_tr"=>"required|string",
            "image"=>"mimes:jpeg,jpg,png,gif|required|max:1000",
            "status"=>"required",
        ];
    }

    public function messages()
    {
        return [
            "name_az.required" => "Ad az sahəsi boş buraxıla bilməz!",
            "name_az.string" => "Ad az sahəsi mətn olmalıdır!",
            "name_en.required" => "Ad en sahəsi boş buraxıla bilməz!",
            "name_en.string" => "Ad en sahəsi mətn olmalıdır!",
            "name_ru.required" => "Ad ru sahəsi boş buraxıla bilməz!",
            "name_ru.string" => "Ad ru sahəsi mətn olmalıdır!",
            "name_tr.required" => "Ad tr sahəsi boş buraxıla bilməz!",
            "name_tr.string" => "Ad tr sahəsi mətn olmalıdır!",
            "image.mimes"=>"Sekil formati duzgun deyil",
            "image.required"=>"Sekil sahəsi boş buraxıla bilməz!",
            "image.max"=>"Sekil olcusu 1mb dan cox ola bilmez!",
            "status.required" => "Status sahəsi boş buraxıla bilməz!",
        ];
    }
}
