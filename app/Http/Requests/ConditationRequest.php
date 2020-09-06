<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConditationRequest extends FormRequest
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
