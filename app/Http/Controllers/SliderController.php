<?php

namespace App\Http\Controllers;


use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SliderController extends Controller
{
    public function getSlider()
    {
        $results = Slider::orderBy('id','desc')->paginate(20);

        return view("site-admin.slider.slider", ["results" => $results]);
    }

    public function getSliderEdit($id)
    {
        $result = Slider::find($id);

        return view("site-admin.slider.slider-edit", ["result" => $result]);
    }

    public function postSliderEdit(SliderRequest $request, $id)
    {
        $request->validated();
        $message = !$id ? 'Slider əlavə olundu' : 'Slider redaktə olundu';

        $request->request->add(['user_id' => Auth::user()->id]);
        BaseController::postModuleEdit($request, $id, 'sliders', $message);

        return Redirect::back();
    }

}
