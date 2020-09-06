<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FaqController extends Controller
{
    public function getFaq()
    {
        $results = Faq::orderBy('id','desc')->paginate(20);

        return view("site-admin.faq.faq", ["results" => $results]);
    }

    public function getFaqEdit($id)
    {
        $result = Faq::find($id);

        return view("site-admin.faq.faq-edit", ["result" => $result]);
    }

    public function postFaqEdit(FaqRequest $request, $id)
    {

        $request->validated();

        $message = !$id ? 'Faq əlavə olundu' : 'Faq redaktə olundu';

        $request->request->add(['user_id' => Auth::user()->id]);

        BaseController::postModuleEdit($request, $id, 'faqs', $message);

        return Redirect::back();
    }
}
