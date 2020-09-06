<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AddressController extends Controller
{
	public function getAddress()
	{
		$countries = Country::where('delete', false)->get();

		$results = Address::orderBy('id', 'desc')->paginate(20);

		return view("site-admin.address.address", ["results" => $results, 'countries' => $countries]);
	}

	public function getAddressEdit($id)
	{
		$countries = Country::where('delete', false)->get();

		$result = Address::find($id);

		return view("site-admin.address.address-edit", ["result" => $result, 'countries' => $countries]);
	}

	public function postAddressEdit(AddressRequest $request, $id)
	{
		$request->validated();

		$message = !$id ? 'Address əlavə olundu' : 'Address redaktə olundu';

		$request->request->add(['user_id' => Auth::user()->id]);

		BaseController::postModuleEdit($request, $id, 'addresses', $message);

		return Redirect::back();
	}
}
