<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function getSettings(){

        return view("admin.settings.settings");

    }
}
