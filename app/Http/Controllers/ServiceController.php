<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ServiceController extends Controller
{
    public function getServices(){

        $results = Service::orderBy('id','desc')->paginate(20);

        return view("site-admin.services.service",["results"=>$results]);

    }
    public function getServiceEdit($id){

        $result = Service::find($id);

        return view("site-admin.services.service-edit",["result"=>$result]);

    }

    public function postServiceEdit(ServiceRequest $request,$id){
    	
        $request->validated();

        $message = !$id ? 'Service əlavə olundu' : 'Service redaktə olundu';

        $request->request->add(['user_id' => Auth::user()->id]);

        BaseController::postModuleEdit($request, $id, 'services', $message);

        return Redirect::back();
    }
}
