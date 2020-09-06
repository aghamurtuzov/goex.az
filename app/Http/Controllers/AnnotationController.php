<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnotationRequest;
use App\Models\Annotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AnnotationController extends Controller
{
    public function getAnnotation()
    {
        $results = Annotation::orderBy('id','desc')->paginate(20);

        return view("site-admin.annotation.annotation", ["results" => $results]);
    }

    public function getAnnotationEdit($id)
    {
        $result = Annotation::find($id);

        return view("site-admin.annotation.annotation-edit", ["result" => $result]);
    }

    public function postAnnotationEdit(AnnotationRequest $request, $id)
    {
        $request->validated();

        $message = !$id ? 'Annotation əlavə olundu' : 'Annotation redaktə olundu';

        $request->request->add(['user_id' => Auth::user()->id]);

        BaseController::postModuleEdit($request, $id, 'annotations', $message);

        return Redirect::back();
    }
}
