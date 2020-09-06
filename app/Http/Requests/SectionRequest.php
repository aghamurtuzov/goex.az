<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "stock_id"=>"required",
            "name"=>"required|string",
            "status"=>"required",
        ];
    }

    public function messages()
    {
        return [
            "stock_id.required" => "Anbar sahəsi boş buraxıla bilməz!",
            "name.required" => "Ad sahəsi boş buraxıla bilməz!",
            "name.string" => "Ad sahəsi mətn olmalıdır!",
            "status.required" => "Status sahəsi boş buraxıla bilməz!",
        ];
    }
}
