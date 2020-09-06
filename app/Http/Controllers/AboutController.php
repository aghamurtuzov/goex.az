<?php

namespace App\Http\Controllers;


use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AboutController extends Controller
{
    public function getAboutEdit()
    {
        $result = About::get()->last();

        return view("site-admin.about.about-edit", ["result" => $result]);
    }

    public function postAboutEdit(AboutRequest $request, $id)
    {
        $request->validated();

        $message = !$id ? 'About əlavə olundu' : 'About redaktə olundu';

        $request->request->add(['user_id' => Auth::user()->id]);

        BaseController::postModuleEdit($request, $id, 'abouts', $message);

        return Redirect::back();
    }

}
