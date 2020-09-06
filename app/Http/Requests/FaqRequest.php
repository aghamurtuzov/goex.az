<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            "status"=>"required",
        ];
    }
    public function messages()
    {
        return [
            "title_az.required" => "Title az sahəsi boş buraxıla bilməz!",
            "title_az.string" => "Title az sahəsi mətn olmalıdır!",
            "title_en.required" => "Title en sahəsi boş buraxıla bilməz!",
            "title_en.string" => "Title en sahəsi mətn olmalıdır!",
            "title_ru.required" => "Title ru sahəsi boş buraxıla bilməz!",
            "title_ru.string" => "Title ru sahəsi mətn olmalıdır!",
            "title_tr.required" => "Title tr sahəsi boş buraxıla bilməz!",
            "title_tr.string" => "Title tr sahəsi mətn olmalıdır!",
            "content_az.required" => "Content az sahəsi boş buraxıla bilməz!",
            "content_az.string" => "Content az sahəsi mətn olmalıdır!",
            "content_en.required" => "Content en sahəsi boş buraxıla bilməz!",
            "content_en.string" => "Content en sahəsi mətn olmalıdır!",
            "content_ru.required" => "Content ru sahəsi boş buraxıla bilməz!",
            "content_ru.string" => "Content ru sahəsi mətn olmalıdır!",
            "content_tr.required" => "Content tr sahəsi boş buraxıla bilməz!",
            "content_tr.string" => "Content tr sahəsi mətn olmalıdır!",
            "status.required" => "Status sahəsi boş buraxıla bilməz!",
        ];
    }
}
