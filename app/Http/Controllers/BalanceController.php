<?php

namespace App\Http\Controllers;

use App\Http\Requests\BalanceRequest;
use App\Models\Balance;
use App\Models\BalanceHistory;
use App\Models\Customer;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BalanceController extends Controller
{
	public function getBalances()
	{
		$results = Balance::paginate(20);
		return view('admin.balances.balances', ['results' => $results]);
	}

	public function getBalanceEdit(Request $request, $id)
	{
		$result = Balance::find($id);
		return view('admin.balances.balances-edit', ['result' => $result]);
	}

	public function postBalanceEdit(BalanceRequest $request, $id)
	{
		$request->validated();

		$message = !$id ? 'Balans əlavə olundu' : 'Balans redaktə olundu';

		$request->request->add(['user_id' => Auth::user()->id]);

		BaseController::postModuleEdit($request, $id, 'balances', $message);

		return Redirect::back();
	}

	public function getBalanceHistories()
	{
		$users = User::where('delete', false)->get();

		$customers = Customer::where('delete', false)->get();

		$results = BalanceHistory::with('balance')->paginate(20);

		return view('admin.balances.balance-histories', ['results' => $results, 'users' => $users, 'customers' => $customers]);
	}


}
