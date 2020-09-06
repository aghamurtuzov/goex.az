<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            "name_az"=>"required|string",
            "name_ru"=>"required|string",
            "name_en"=>"required|string",
            "tariff_id"=>"required",
            "discount"=>"required",
            "is_fix_or_person"=>"required",
            "start_time"=>"required",
            "end_time"=>"required",
            "date"=>"required"

        ];
    }

    public function messages()
    {
        return [
            "name_az.required" => "Ad az sahəsi boş buraxıla bilməz!",
            "name_az.string" => "Ad az sahəsi mətn Olmalidir!",
            "name_ru.required" => "Ad ru sahəsi boş buraxıla bilməz!",
            "name_ru.string" => "Ad ru sahəsi mətn Olmalidir!",
            "name_en.required" => "Ad en sahəsi Boş buraxıla bilməz!",
            "name_en.string" => "Ad en sahəsi mətn Olmalidir!",
            "tariff_id.required" => "Tarif Boş buraxıla bilməz!",
            "discount.required" => "Endirim Boş buraxıla bilməz!",
            "is_fix_or_person.required" => "Endirim Status boş buraxıla bilməz!",
            "start_time.required"=>"Baslangic Saat Bos Buraxila Bilmez",
            "end_time.required"=>" Bitis Saat Boş Buraxila Bilmez",
            "date.required"=>" Tarix   Boş Buraxila Bilmez"


        ];
    }
}
