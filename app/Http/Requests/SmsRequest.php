<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SmsRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            "type" => "required|integer",
            "message" => "required",
        ];
    }

    public function messages()
    {
        return [
            "type.required" => "Qəbul edən sahəsi boş buraxıla bilməz!",
            "type.integer" => "Qəbul edən sahəsi mətn ola bilməz!",
            "message.required" => "Mesaj sahəsi boş buraxıla bilməz!",
        ];
    }
}
