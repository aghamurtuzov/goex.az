<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Models\CustomerBalance;
use App\Models\Filial;
use App\Models\Orders;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function getCustomer($id = 'all')
    {

        if ($id == 1) {
            $results = Customer::has('customOrder')->where("type", 1)->orderBy('id', 'desc')->paginate(15);
        } elseif ($id == 2) {
            $results = Customer::whereHas('customOrder', function ($q) {
                $q->whereNotIn('situation', [5, 6, 7]);
            })->where("type", 1)->orderBy('id', 'desc')->paginate(15);

        } elseif ($id == 3) {
            $results = Customer::doesntHave('customOrder')->where("type", 1)->orderBy('id', 'desc')->paginate(15);
        } else {
            $results = Customer::where("type", 1)->orderBy('id', 'desc')->paginate(15);
        }

        $filials = Filial::where(['status' => true, 'delete' => false])->get();

        return view("admin.customer.customer", ["results" => $results, "filials" => $filials]);
    }

    public function getCustomerProfile($id)
    {
        $result = Customer::findOrFail($id);

        $orderAlls = Orders::where('customer_id', $id)->paginate(10);

        $orderActives = Orders::where('customer_id', $id)->whereNotIn('situation', [5, 6, 7])->paginate(10);

        $orderEnds = Orders::where(['customer_id' => $id, 'situation' => 7])->paginate(10);

        $filials = Filial::where(['status' => true, 'delete' => false])->get();

        return view("admin.customer.customer-profile", [
            "result" => $result,
            "orderAlls" => $orderAlls,
            "orderActives" => $orderActives,
            "orderEnds" => $orderEnds,
            "filials" => $filials
        ]);
    }

    public function getCustomerInfo($id)
    {

        $result = Orders::findOrFail($id);

        return view('admin.customer.customer-info', ['result' => $result]);
    }

    public function postCustomerProfile(CustomerRequest $request,$id)
    {
        $balances = [];
        $request->validated();
        try {
            $customer = Customer::find($id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'address' => $request->address,
                'date_of_birth' => $request->date_of_birth,
                'filial_id' => $request->filial_id,
                'phone' => $request->phone,
                'email' => $request->email,
                'discount' => $request->discount,
                'gender' => $request->gender,
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

            return Redirect::back()->with('success-message', 'Müştəri redaktə olundu');

        } catch (\Exception $e) {
            return Redirect::back()->with('success-error', 'Müştəri redaktə olunması zaman xəta baş verdi '.$e);
        }
    }


}
