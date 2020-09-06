<?php

namespace App\Http\Controllers\AuthSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class CustomerForgotPasswordController extends Controller
{
    public function getSiteForgot(){
        return view("site.forgot.forgot");
    }
//    protected function broker(){
//        return Password::broker('customers');
//    }
}
