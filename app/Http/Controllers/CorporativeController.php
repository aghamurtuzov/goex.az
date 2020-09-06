<?php

namespace App\Http\Controllers;

use App\Http\Requests\CorporativeRequest;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\CustomerBalance;
use App\Models\Filial;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CorporativeController extends Controller
{
    public function getCorporative($id = 'all')
    {

        if ($id == 1) {
            $results = Customer::has('customOrder')->where("type", 2)->orderBy('id', 'desc')->paginate(15);
        } elseif ($id == 2) {
            $results = Customer::whereHas('customOrder', function ($q) {
                $q->whereNotIn('situation', [5, 6, 7]);
            })->where("type", 2)->orderBy('id', 'desc')->paginate(15);

        } elseif ($id == 3) {
            $results = Customer::doesntHave('customOrder')->where("type", 2)->orderBy('id', 'desc')->paginate(15);
        } else {
            $results = Customer::where("type", 2)->orderBy('id', 'desc')->paginate(15);
        }

        $filials = Filial::where(['status' => true, 'delete' => false])->get();

        return view("admin.corporative.corporative", ["results" => $results, "filials" => $filials]);
    }

    public function getCorporativeProfile($id)
    {
        $result = Customer::findOrFail($id);

        $orderAlls = Orders::where('customer_id', $id)->paginate(10);

        $orderActives = Orders::where('customer_id', $id)->whereNotIn('situation', [5, 6, 7])->paginate(10);

        $orderEnds = Orders::where(['customer_id' => $id, 'situation' => 7])->paginate(10);

        $filials = Filial::where(['status' => true, 'delete' => false])->get();

        return view("admin.corporative.corporative-profile", [
            "result" => $result,
            "orderAlls" => $orderAlls,
            "orderActives" => $orderActives,
            "orderEnds" => $orderEnds,
            "filials" => $filials
        ]);
    }

    public function getCorporativeInfo($id)
    {

        $result = Orders::findOrFail($id);

        return view('admin.corporative.corporative-info', ['result' => $result]);
    }

    public function postCorporativeProfile(CorporativeRequest $request, $id)
    {
//        $request->validated();
//
//        BaseController::postModuleEdit($request, $id, 'customers', 'Müştəri redaktə olundu');
//
//        return Redirect::back();

        $balances = [];
        $request->validated();
        try {
            $customer = Customer::find($id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'date_of_birth' => $request->date_of_birth,
                'filial_id' => $request->filial_id,
                'passport' => $request->passport,
                'passport_fin' => $request->passport_fin,
                'phone' => $request->phone,
                'email' => $request->email,
                'discount' => $request->discount,
                'gender' => $request->gender,
                'company_name' => $request->company_name,
                'account_number' => $request->account_number,
                'status' => $request->status,
            ]);

            $balances[1] = $request->balance_azn;
            $balances[2] = $request->balance_euro;
            $balances[3] = $request->balance_usd;

            for ($i = 1; $i <= count($balances); $i++) {

                CustomerBalance::where(['customer_id' => $id, 'balance_id' => $i])->update([
                    'amount' => $balances[$i],
                ]);
            }

            return Redirect::back()->with('success-message', 'Korporativ müştəri redaktə olundu');

        } catch (\Exception $e) {
            return Redirect::back()->with('success-error', 'Korporativ müştəri redaktə olunması zaman xəta baş verdi ');
        }
    }

    public function getCorporativeForm()
    {
        $filials = Filial::where(['status' => true, 'delete' => false])->get();
        return view('admin.corporative.corporative-form', ["filials" => $filials]);
    }

    public function postCorporativeForm(CorporativeRequest $request)
    {
        $balances = [];
        $request->validated();
        try {
            $pass = Str::random(8);
            $customer = Customer::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'date_of_birth' => $request->date_of_birth,
                'filial_id' => $request->filial_id,
                'passport' => $request->passport,
                'passport_fin' => $request->passport_fin,
                'phone' => $request->phone,
                'email' => $request->email,
                'customer_code' => rand(1000000, 99999999),
                'discount' => $request->discount,
                'gender' => $request->gender,
                'company_name' => $request->company_name,
                'account_number' => $request->account_number,
                'status' => 1,
                'date' => date('Y-m-d'),
                'type' => 2,
                'password' => Hash::make($pass),
            ]);

            $balances[1] = $request->balance_azn;
            $balances[2] = $request->balance_euro;
            $balances[3] = $request->balance_usd;

            for ($i = 1; $i <= count($balances); $i++) {

                CustomerBalance::create([
                    'balance_id' => $i,
                    'customer_id' => $customer->id,
                    'amount' => $balances[$i],
                ]);
            }

            return Redirect::back()->with('success-message', 'Korporativ müştəri əlavə olundu');

        } catch (\Exception $e) {
            return Redirect::back()->with('success-error', 'Korporativ müştəri əlavə olunması zaman xəta baş verdi ' . $e);
        }

    }

}
