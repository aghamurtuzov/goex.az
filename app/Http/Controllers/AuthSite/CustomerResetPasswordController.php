<?php

namespace App\Http\Controllers\AuthSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class CustomerResetPasswordController extends Controller
{
//    public function __construct(){
//        $this->middleware('customers');
//    }

//    protected $redirectTo = '/getSiteReset';

    public function getSiteReset(){
       return view("site.reset.reset");
   }
//    protected function guard()
//    {
//        return Auth::guard('customers');
//    }
//    protected function broker()
//    {
//        return Password::broker('customers');
//    }
//    public function getSiteResetForm(Request $request,$token=null){
//
//        return view('site.reset.reset')->with(['token'=>$token,'email'=>$request->email]);
//    }


}
