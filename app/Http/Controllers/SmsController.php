<?php

namespace App\Http\Controllers;

use App\Http\Requests\SmsCustomerCodeRequest;
use App\Http\Requests\SmsRequest;
use App\Models\Customer;
use App\Models\Sms;
use App\Models\SmsTemplate;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SmsController extends Controller
{
	public function getSms()
	{
		$results = Sms::paginate(20);

		return view('admin.sms.sms', ['results' => $results]);
	}


	public function getSmsEdit(Request $request, $id)
	{
		$result = Sms::find($id);

		$smsTemplates = SmsTemplate::where(['status' => true, 'delete' => false])->get();

		return view('admin.sms.sms-edit', ['result' => $result, 'smsTemplates' => $smsTemplates]);

	}


	public function postSmsEdit(SmsRequest $request, $id)
	{
		$request->validated();

		$message = !$id ? 'Sms əlavə olundu' : 'Sms redaktə olundu';

		$request->request->add(['user_id' => Auth::user()->id]);

		if (isset($request->code)) {
			$check = Customer::where(['customer_code' => $request->code, 'status' => true, 'delete' => false])->first();
			if (!$check) {
				Session::flash('success-error', 'Kod yanlışdır');
				return Redirect::back();
			}
		}

		$request->request->remove('code');

		if ($request->get('type') == 2) {
			$customers = Customer::where('date_of_birth', date('Y-m-d'))->get();
			foreach ($customers as $c) {
				$c_id = DB::table('sms')->insertGetId([
					'user_id' => Auth::user()->id,
					'type' => $request->get('message'),
					'message' => $request->get('message'),
					'phone' => $c->phone,
				]);

				//sms gedecek
			}
			Session::flash('success-message', $message);
		} else {
			BaseController::postModuleEdit($request, $id, 'sms', $message);
		}

		return Redirect::back();
	}

	public function getCustomerWithCode(SmsCustomerCodeRequest $request)
	{
		try {

			$request->validated();

			$code = $request->get('code');

			$result = Customer::where('customer_code', $code)->get()->last();

			if (!$result) {
				return response()->json(['status' => false, 'error' => '', 'success' => 404, 'result' => [], 'message' => 'Daxil etdiyiniz kod yanlışdır']);
			}

		} catch (\Exception $e) {
			return response()->json(['status' => false, 'message' => $e->getMessage(), 'line' => $e->getLine()]);
		}

		return response()->json(['status' => true, 'error' => '', 'success' => 200, 'result' => $result]);
	}


}
