<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteOrderRequest extends FormRequest
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
            'link' => 'required',
            'product_name' => 'required',
            'quantity' => 'required',
            'product_size' => 'required',
            'value' => 'required',
            'description' => 'required',
            'total_price' => '',
            'kargo_price' => '',
            'price_status' => '',
            'color' => '',
            'check' => '',
        ];
    }

    public function messages()
    {
        return [
          'link.required' => 'Link sahəsi boş buraxıla bilməz!',
          'product_name.required' => 'Məhsul adı sahəsi boş buraxıla bilməz!',
          'quantity.required' => 'Miqdarı sahəsi boş buraxıla bilməz!',
          'product_size.required' => 'Eni sahəsi boş buraxıla bilməz!',
          'value.required' => 'Qiymət sahəsi boş buraxıla bilməz!',
          'description.required' => 'Sifarişiniz haqqında sahəsi boş buraxıla bilməz!',

        ];
    }
}
