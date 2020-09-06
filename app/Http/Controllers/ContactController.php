<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{

    public function getContactEdit(){
        $result = Contact::get()->last();
        return view("site-admin.contact.contact-edit",["result"=>$result]);
    }
    public function postContactEdit(ContactRequest $request,$id){

        $request->validated();

        $message = !$id ? 'Contact əlavə olundu' : 'Contact redaktə olundu';

        $request->request->add(['user_id' => Auth::user()->id]);

        BaseController::postModuleEdit($request, $id, 'contacts', $message);

        return Redirect::back();
    }
}
