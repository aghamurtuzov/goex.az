<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TariffRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            "price"=>"required",
            "weight_text_az"=>"required|string",
            "weight_text_ru"=>"required|string",
            "weight_text_en"=>"required|string",
            "country_id"=>"required",
            "type"=>"required",
            "start_weight"=>"required",
            "end_weight"=>"required",
            "sort"=>"required",
            "status"=>"required"
        ];
    }
    public function messages()
    {
        return [
            "price.required" => "Qiymət sahəsi boş buraxıla bilməz!",
            "weight_text_az.required"=>"Çəki Az sahəsi boş olmamalidir! ",
            "weight_text_az.string"=>"Çəki Az sahəsi mətn olmalidir! ",
            "weight_text_en.required"=>"Çəki En sahəsi boş olmamalidir! ",
            "weight_text_en.string"=>"Çəki En sahəsi mətn olmalidir! ",
            "weight_text_ru.required"=>"Çəki Ru sahəsi boş olmamalidir! ",
            "weight_text_ru.string"=>"Çəki Ru sahəsi mətn olmalidir! ",
            "country_id.required"=>"Ölkə sahəsi boş olmamalidir! ",
            "type.required"=>"Tip Sahəsi Boş olmamilidir!",
            "start_weight.required"=>"Başlanğıc Çəki Boş Olmamalıdır!",
            "end_weight.required"=>"Son Çəki Boş Olmamalıdır!",
            "sort.required"=>"Sort Sahəsi Boş Olmamalıdır!",
            "status.required"=>"Status Sahəsi Boş Olmamalıdır!"

        ];
    }
}
