<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddBalanceRequest;
use App\Http\Requests\CustomerPrivateRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\StatementRequest;
use App\Models\Address;
use App\Models\Apply;
use App\Models\Balance;
use App\Models\BalanceHistory;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Filial;
use App\Models\OrderHistory;
use App\Models\OrderLink;
use App\Models\Orders;
use App\Models\Statement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware("customers");
    }

    public function getAccount()
    {
        $customer_id = Auth::guard("customers")->user()->id;

        $result = Customer::with('balances')->find($customer_id);

        $filials = Filial::where(["status" => true, "delete" => false])->get();

        $address = Address::where(["status" => true, "delete" => false])->get();

		$applies = Apply::where(["delete" => false])->get();

        $countries = Country::where(["status" => true, "delete" => false])->get();

        $orders = Orders::where(["customer_id" => $customer_id])->with('orderHistory')->orderBy('id', 'desc')->paginate(5);

        $orderLinks = OrderLink::where(["customer_id" => $customer_id])->orderBy('id', 'desc')->paginate(5);

        $balance_histories = BalanceHistory::where('customer_id', $customer_id)->orderBy('id', 'DESC')->get();

        $balances = Balance::orderBy('id', 'DESC')->get();

        //hansi tabin active olmasi ucun

        return view("site.account.account")->with([
            "result" => $result,
            "filials" => $filials,
            "address" => $address,
            "countries" => $countries,
            "orders" => $orders,
            "balance_histories" => $balance_histories,
            "balances" => $balances,
			"applies" => $applies,
            "orderLinks" => $orderLinks,
        ]);
    }


    public function postSitePrivate(CustomerPrivateRequest $request, $id)
    {
        $request->validated();

        $message = !$id ? 'Şəxsi məlumat əlavə olundu' : 'Şəxsi məlumat redaktə olundu';

        BaseController::postModuleEdit($request, $id, 'customers', $message);

        return Redirect::back();
    }

    public function postPassword(PasswordRequest $request, $id)
    {
        Customer::find($id)->update([
            "password" => Hash::make($request->get("password"))
        ]);

        return Redirect()->back()->with("success-message", "Şifrə redaktə olundu!");
    }

    public function postAddBalance(AddBalanceRequest $request)
    {
        $request->validated();

        $customer = Auth::guard("customers")->user();

        $amount = $request->get('amount');

        $balance_id = $request->get('balance_id');

        $balance = Balance::where('id', $balance_id)->first();

        if (!$balance) {
            Session::flash('error-message', 'Balans tapilmadi');
        } else {
            $check = $customer->balances()->wherePivot('balance_id', $balance->id)->first();
            if ($check) {
                $customer->balances()->updateExistingPivot($balance->id, ['amount' => ($check->pivot->amount + $amount)]);
            } else {
                $customer->balances()->attach($balance->id, ['amount' => $amount]);
            }

            Session::flash('success-message', 'Balans artirildi');
        }

        return Redirect::back();
    }

    public function postAccountTabActive(Request $request)
    {
        $id = $request->get("id");

        Session::put('active', $id);

        return response()->json(['status' => 'true', 'error' => '', 'success' => 200]);
    }

    public function postNewStatement(StatementRequest $request){
        $request->validated();
        try {
            Statement::create([
                'customer_id' => Auth::guard("customers")->user()->id,
                'balance_id' => $request->get('balance_id'),
                'tracking_code' => $request->get('tracking_code'),
                'company' => $request->get('company'),
                'product' => $request->get('product'),
                'price' => $request->get('price'),
                'quantity' => $request->get('quantity'),
                'text' => $request->get('text'),
                'status' => 1,
            ]);

            return redirect()->back()->with('success-message', 'Məlumat göndərildi');
        } catch (\Exception $e) {
            return redirect()->back()->with('success-error', 'Bir xeta yarandi ' . $e);
        }
    }

}
