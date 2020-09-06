<?php

namespace App\Http\Controllers\AuthSite;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRegisterRequest;
use App\Models\Customer;
use App\Models\CustomerBalance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CustomerRegisterController extends Controller
{
    public function postSiteRegister(CustomerRegisterRequest $request)
    {
        $customer = Customer::create([
            "email" => $request->get("email"),
            "password" => Hash::make($request->get("password")),
            "customer_code" => rand(1000000, 99999999),
            "type" => 1,
        ]);
        for ($i = 1; $i <= 3; $i++) {
            CustomerBalance::create([
                "balance_id" => $i,
                "customer_id" => $customer->id,
                "amount" => 0
            ]);
        }
        Auth::guard("customers")->login($customer, true);
        return redirect()->route("getSiteAccount");
    }
}
