<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Http\Requests\CustomerCompanyRequest;
use App\Models\Company;
use App\Models\CustomerCompany;
use App\Models\Tariff;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{
	public function getComponies()
	{
		$results = Company::paginate(20);
		$tariffs = Tariff::where(['status' => true, 'delete' => false])->get();
		return view('admin.componies.componies', ['results' => $results, "tariffs" => $tariffs]);
	}

	public function getCustomerComponies()
	{
		$results = CustomerCompany::paginate(20);
		return view('admin.componies-customer.componies', ['results' => $results]);
	}

	public function getCustomerCompanyEdit(Request $request, $id)
	{
		$result = CustomerCompany::find($id);
		return view('admin.componies-customer.componies-edit', ['result' => $result]);
	}


	public function getCompanyEdit(Request $request, $id)
	{
		$result = Company::find($id);
		$tariffs = Tariff::where(['status' => true, 'delete' => false])->get();

		return view('admin.componies.componies-edit', ['result' => $result, "tariffs" => $tariffs]);
	}

	public function postCompanyEdit(CompanyRequest $request, $id)
	{
		$request->validated();

		$start_date = date_format(date_create(trim(explode('-', $request->get('date'))[0])), 'Y-m-d');

		$end_date = date_format(date_create(trim(explode('-', $request->get('date'))[1])), 'Y-m-d');

		$message = !$id ? 'Kampaniya əlavə olundu' : 'Kampaniya redaktə olundu';

		$request->request->add(['user_id' => Auth::user()->id]);

		$request->request->add(['start_date' => $start_date]);

		$request->request->add(['end_date' => $end_date]);

		$request->request->remove('date');

		BaseController::postModuleEdit($request, $id, 'companies', $message);

		return Redirect::back();
	}

	public function postCustomerCompanyEdit(CustomerCompanyRequest $request, $id)
	{
		$request->validated();

		$message = !$id ? 'Musteri  Kampaniya əlavə olundu' : 'Musteri Kampaniya redaktə olundu';

		$request->request->add(['user_id' => Auth::user()->id]);

		BaseController::postModuleEdit($request, $id, 'customer_companies', $message);

		return Redirect::back();
	}


}
