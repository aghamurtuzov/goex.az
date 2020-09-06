<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRegisterRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required_with:password|same:password'
        ];
    }

    public function messages()
    {
        return [
            "email.required" => "Boş buraxila bilməz!",
            "email.email" => "Email olmalıdır!",
            "password.required" => "Boş buraxila bilməz!",
            "password_confirmation.required_with" => "Parol eyni deyil!"
        ];
    }
}
