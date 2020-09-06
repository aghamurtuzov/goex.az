<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatementRequest extends FormRequest
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
            'customer_id'=>'',
            'balance_id'=>'required',
            'order_id'=>'',
            'tracking_code'=>'required',
            'company'=>'required',
            'product'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'text'=>'required',
            'status'=>'',
            'date'=>'',
        ];
    }

    public function messages()
    {
        return [
            "tracking_code.required" => "Tracking sahəsi boş buraxıla bilməz!",
            "balance_id.required" => "Valyuta sahəsi boş buraxıla bilməz!",
            "company.required" => "Şirkət sahəsi boş buraxıla bilməz!",
            "product.string" => "Məhsul sahəsi mətn olmalıdır!",
            "price.required" => "Qiymət sahəsi boş buraxıla bilməz!",
            "quantity.required" => "Miqdar sahəsi boş buraxıla bilməz!",
            "text.required" => "Qeyd sahəsi boş buraxıla bilməz!",
        ];
    }
}
