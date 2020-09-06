<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SmsCustomerCodeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "code" => "required",
        ];
    }

    public function messages()
    {
        return [
            "code.required" => "Boş buraxıla bilməz!",
        ];
    }
}
