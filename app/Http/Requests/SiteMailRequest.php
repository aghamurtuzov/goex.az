<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteMailRequest extends FormRequest
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
            "fullname"=>"required|string",
            "email"=>"required|email",
            "phone"=>"required|numeric",
            "message"=>"required|string"
        ];
    }
    public function messages()
    {
        return [
            "fullname.required"=>"Ad soyad sahəsi boş buraxıla bilməz!",
            "email.required"=>"Email sahəsi boş buraxıla bilməz!",
            "phone.required"=>"Telefon sahəsi boş buraxıla bilməz!",
            "phone.numeric"=>"Telefon sahəsi rəqəm tipində olmalıdır!",
            "message.required"=>"Mesaj sahəsi boş buraxıla bilməz!",
            "email.email"=>"Email sahəsi email tipində olmalıdır!",
            "message.string"=>"Mesaj sahəsi text tipində olmalıdır!",
            "fullname.string"=>"Mesaj sahəsi text tipində olmalıdır!",
        ];
    }
}
