<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiteApplyRequest extends FormRequest
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
            'category_id' => 'required',
            'country_id' => 'required',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'category_id.required' => 'Kateqoriya sahəsi boş buraxıla bilməz!',
          'country_id.required' => 'Ölkə adı sahəsi boş buraxıla bilməz!',
          'message.required' => 'Mesaj sahəsi boş buraxıla bilməz!',
        ];
    }
}
