<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformationRequest;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class InformationController extends Controller
{
    public function getInformation()
    {

        $results = Information::orderBy('id','desc')->paginate(20);

        return view("site-admin.information.information", ["results" => $results]);
    }

    public function getInformationEdit($id)
    {

        $result = Information::find($id);

        return view("site-admin.information.information-edit", ["result" => $result]);
    }

    public function postInformationEdit(InformationRequest $request, $id)
    {
        $request->validated();

        $message = !$id ? 'Information əlavə olundu' : 'Information redaktə olundu';

        $request->request->add(['user_id' => Auth::user()->id]);

        BaseController::postModuleEdit($request, $id, 'information', $message);

        return Redirect::back();
    }
}
