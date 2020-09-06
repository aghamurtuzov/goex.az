<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddSubSectionRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "barcode"=>"required",
            "subsection_id"=>"required|string",
            "status"=>"required",
        ];
    }

    public function messages()
    {
        return [
            "subsection_id.required" => "Bölmə sahəsi boş buraxıla bilməz!",
            "barcode.required" => "Ad sahəsi boş buraxıla bilməz!",
            "status.required" => "Status sahəsi boş buraxıla bilməz!",
        ];
    }
}
