<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCommentRequest extends FormRequest
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
            'comment' => 'max:250'
        ];
    }

    public function messages()
    {
        return [
            'comment.string' => 'Şərh sahəsi mətn olmalıdır!',
            'comment.max' => 'Şərh sahəsi maksimum 250 simvol ola bilər!'
        ];
    }
}
