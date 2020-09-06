<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBalanceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "amount"=>"required|numeric",
            "balance_id"=>"required|integer",
        ];
    }


    public function messages()
    {
        return [
            "amount.required" => "Mebleg sahəsi boş buraxıla bilməz!",
            "amount.decimal" => "Mebleg sahəsi reqem olmalıdır!",
            "balance_id.required" => "Balans sahəsi boş buraxıla bilməz!",
            "balance_id.integer" => "Balans sahəsi reqem olmalıdır!",
        ];
    }
}
