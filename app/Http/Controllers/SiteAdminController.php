<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteAdminController extends Controller
{
    public function getAdmin(){

        return view("site-admin.index");

    }
}
