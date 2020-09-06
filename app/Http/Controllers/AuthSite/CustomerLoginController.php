<?php

namespace App\Http\Controllers\AuthSite;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    use AuthenticatesUsers;

    public function postSiteLogin(Request $request){
        if ($request->isMethod('post')) {
            if (Auth::guard("customers")->attempt(['email'=>$request->get("email"),'password'=>$request->get("password")],$request->get("remember"))) {
                return redirect()->route("getSiteAccount");
            }else{
                return redirect()->route("getSiteHome");
            }
        }
    }
    public function getSiteLogout(){
        try{
            Auth::guard("customers")->logout();
            return redirect()->route("getSiteHome");
        }
        catch (\Exception $e){
            return redirect()->route("getSiteHome");
        }

    }
}
