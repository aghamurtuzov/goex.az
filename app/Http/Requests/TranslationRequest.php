<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TranslationRequest extends FormRequest
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
            "key"=>"required|string",
            "value_az"=>"required|string",
            "value_ru"=>"required|string",
            "value_tr"=>"required|string",
            "value_en"=>"required|string",
        ];
    }


    public function messages()
    {
        return [
            "key.required" => "Key sahəsi boş buraxıla bilməz!",
            "value_az.required" => "Value az sahəsi boş buraxıla bilməz!",
            "value_ru.string" => "Value ru sahəsi mətn olmalıdır!",
            "value_tr.required" => "Value tr sahəsi boş buraxıla bilməz!",
            "value_en.string" => "Value en sahəsi mətn olmalıdır!",
            "group_id.required" => "Qrup sahəsi boş buraxıla bilməz!",
        ];
    }
}
