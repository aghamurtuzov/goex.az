<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConditationRequest;
use App\Models\Condition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ConditionController extends Controller
{

    public function getConditionEdit(){
        $result = Condition::get()->last();
        return view("site-admin.conditation.conditation-edit",["result"=>$result]);
    }
    public function postConditionEdit(ConditationRequest $request,$id){
        $request->validated();

        $message = !$id ? 'Şərt əlavə olundu' : 'Şərt redaktə olundu';

        $request->request->add(['user_id' => Auth::user()->id]);

        BaseController::postModuleEdit($request, $id, 'conditions', $message);

        return Redirect::back();
    }
}
