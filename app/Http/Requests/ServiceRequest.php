<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            "title_az"=>"required|string",
            "title_en"=>"required|string",
            "title_ru"=>"required|string",
            "title_tr"=>"required|string",
            "content_az"=>"required|string",
            "content_en"=>"required|string",
            "content_ru"=>"required|string",
            "content_tr"=>"required|string",
            "image"=>"mimes:jpeg,jpg,png,gif|required|max:1000",
            "status"=>"required",
        ];
    }
    public function messages()
    {
        return [
            "title_az.required" => "Title Az sahəsi boş buraxıla bilməz!",
            "title_az.string" => "Title Az sahəsi mətn olmalıdır!",
            "title_en.required" => "Title En sahəsi boş buraxıla bilməz!",
            "title_en.string" => "Title En sahəsi mətn olmalıdır!",
            "title_ru.required" => "Title Ru sahəsi boş buraxıla bilməz!",
            "title_ru.string" => "Title Ru sahəsi mətn olmalıdır!",
            "title_tr.required" => "Title Tr sahəsi boş buraxıla bilməz!",
            "title_tr.string" => "Title Tr sahəsi mətn olmalıdır!",
            "content_az.required" => "Content Az sahəsi boş buraxıla bilməz!",
            "content_az.string" => "Content Az sahəsi mətn olmalıdır!",
            "content_en.required" => "Content En sahəsi boş buraxıla bilməz!",
            "content_en.string" => "Content En sahəsi mətn olmalıdır!",
            "content_ru.required" => "Content Ru sahəsi boş buraxıla bilməz!",
            "content_ru.string" => "Content Ru sahəsi mətn olmalıdır!",
            "content_tr.required" => "Content Tr sahəsi boş buraxıla bilməz!",
            "content_tr.string" => "Content Tr sahəsi mətn olmalıdır!",
            "image.mimes"=>"Sekil formati duzgun deyil",
            "image.required"=>"Sekil sahəsi boş buraxıla bilməz!",
            "image.max"=>"Sekil olcusu 1mb dan cox ola bilmez!",
            "status.required" => "Status sahəsi boş buraxıla bilməz!",
        ];
    }
}
