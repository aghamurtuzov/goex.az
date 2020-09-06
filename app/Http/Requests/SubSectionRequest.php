<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubSectionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "section_id"=>"required",
            "name"=>"required|string",
            "status"=>"required",
        ];
    }

    public function messages()
    {
        return [
            "section_id.required" => "Bölmə sahəsi boş buraxıla bilməz!",
            "name.required" => "Ad sahəsi boş buraxıla bilməz!",
            "name.string" => "Ad sahəsi mətn olmalıdır!",
            "status.required" => "Status sahəsi boş buraxıla bilməz!",
        ];
    }
}
