<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Filial;
use App\Models\Sack;
use App\Models\Section;
use App\Models\Stock;
use App\Models\SubSection;
use App\Models\TranslationGroup;
use App\Modules;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BaseController extends Controller
{

    public static function postModuleEdit(Request $request, $id = 0, $module, $message)
    {

        $data = $request->all();

        array_shift($data);
        App::setLocale('az');

        if ($id >= 0) {
            if ($id == 0) {

                $id = DB::table($module)->insertGetId($data);

                Session::flash('success-message', $message);


            } else if ($id > 0) {

                DB::table($module)
                    ->where('id', $id)
                    ->update($data);

                Session::flash('success-message', $message);

            }
            if ($request->hasFile("image")) {
                $upload = $request->file('image');
                $filename = $upload->store('public/' . $module);

                DB::table($module)
                    ->where('id', $id)
                    ->update([
                        'image' => $filename
                    ]);
            }

        }

        return $id;
    }

    public function postModuleStatus(Request $request)
    {
        $id = $request->get('id');
        $module = $request->get('module');
        $status = $request->get('status');

        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'module' => 'required|string',
            'status' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'false', 'error' => 'SomethingHaveWrong']);
        }

        $mod = DB::table($module)->where("id", $id)->first();
        if (!$mod) {
            return response()->json(['status' => 'false', 'error' => 'NotFoundModule']);
        }

        DB::table($module)->where("id", $id)->update(['status' => $status]);


        return response()->json(['status' => $status, 'error' => '', 'success' => 200]);
    }

    public function getModuleSearch(Request $request, $module, $path, $viewFile, $mainPath = 'admin', $routeId = null)
    {
        $data = $request->all();

        $column_name = $request->get('column_name');
        $order_type = $request->get('order_type');

        //delete first element in data array
        array_shift($data);

        //delete perPage in data array
        $perPage = $data['perPage'];
        unset($data['perPage']);

        //get table name
        $appPrefix = $module == 'user' ? 'App' : 'App\Models';
        $modelName = $appPrefix . '\\' . ucfirst($module);


        $result = $modelName::where('delete', false);

        foreach ($data as $key => $value) {
            if ($key != 'column_name' & $key != 'order_type') {
                $result->$key($value);
            }
        }

        if ($column_name) {
            $result->column_name($column_name, $order_type);
        }

        $results = $result->orderBy('id', 'DESC')->paginate($perPage);


        $data = [
            'results' => $results,
            'module' => $module,
            'perPage' => $perPage,
        ];

        if ($modelName == 'App\Models\Customer') {

            $filials = Filial::where('delete', false)->get();

            $data['filials'] = $filials;
            $data['routeId'] = $routeId;

        }
		if ($modelName == 'App\Models\Address') {

			$countries = Country::where('delete', false)->get();

			$data['countries'] = $countries;
		}
		if ($modelName == 'App\Models\Statement') {

			$balances = Balance::where('delete', false)->get();

			$data['balances'] = $balances;
		}
		if ($modelName == 'App\Models\Apply') {

			$countries = Country::where('delete', false)->get();

			$data['countries'] = $countries;
		}

        if ($modelName == 'App\Models\Tariff') {

            $countries = Country::where('delete', false)->get();

            $data['countries'] = $countries;
        }
        if ($modelName == 'App\User') {

            $roles = DB::table('roles')->where(['status' => true, 'is_deleted' => false])->get();

            $data['roles'] = $roles;
        }

        if ($modelName == 'App\Models\Stock') {

            $countries = Country::where('delete', false)->get();

            $cities = City::where('delete', false)->get();

            $data['countries'] = $countries;

            $data['cities'] = $cities;

            $data['type'] = $request->get('type');
        }

        if ($modelName == 'App\Models\Section') {

            $stocks = Stock::where('delete', false)->get();

            $data['stocks'] = $stocks;
        }

        if ($modelName == 'App\Models\SubSection') {

            $sections = Section::where('delete', false)->get();

            $data['sections'] = $sections;
        }

        if ($modelName == 'App\Models\Sack') {

            $stocks = Sack::where('delete', false)->get();

            $data['stocks'] = $stocks;

            $results = new Sack();

            $position = SackController::position($results, $request->get('position'));

            $data['position'] = $position;
        }
        if ($modelName == 'App\Models\Country') {

            $results_ = Category::where('delete', false)->get();

            $data['results_'] = $results_;
        }
        if ($modelName == 'App\Models\Category') {

            $results_ = Country::where('delete', false)->get();

            $data['results'] = $results_;

            $data['results_'] = $results;
        }
        if ($modelName == 'App\Models\Orders') {

            $type = $request->get('type');

            $situation = $request->get('situation');

            $sacks = Sack::where('delete', false)->get();

            $stocks = Stock::where('delete', false)->where('type', $request->get('type') == 'stock' ? 0 : 1)->get();

            $sections = Section::where('delete', false)->get();

            $sub_sections = SubSection::where('delete', false)->get();

            $data['sacks'] = $sacks;

            $data['sub_sections'] = $sub_sections;

            $data['sections'] = $sections;

            $data['stocks'] = $stocks;

            $data['type'] = $type;

            $data['situation'] = $situation;

            $data['routeId'] = $routeId;
        }

        if ($modelName == 'App\Models\BalanceHistory') {

            $users = User::where('delete', false)->get();

            $customers = Customer::where('delete', false)->get();

            $data['users'] = $users;

            $data['customers'] = $customers;
        }

		if ($modelName == 'App\Models\Translation') {

			$groups = TranslationGroup::get();

			$data['groups'] = $groups;
		}

        return view($mainPath . '.' . $path . '.' . $viewFile, $data);
    }

    public
    function postModuleDelete(Request $request)
    {
        $id = $request->get('id');
        $module = $request->get('module');

        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'module' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'false', 'error' => 'SomethingHaveWrong']);
        }

        if (!$module) {
            return response()->json(['status' => 'false', 'error' => 'NotFoundModule']);
        }

        DB::table($module)
            ->where('id', $id)
            ->update([
                'delete' => true,
            ]);

        return response()->json(['status' => 'true', 'error' => '', 'success' => 200]);
    }


    public static function changeOrderStatus($order_id, $status, $content = '')
    {
        DB::table('order_histories')->insertGetId([
            'order_id' => $order_id,
            'user_id' => Auth::user()->id,
            'content' => $content,
            'status' => $status
        ]);
    }

    public static function changeSackStatus($sack_id, $status, $content = '')
    {
        DB::table('sack_history')->insertGetId([
            'sack_id' => $sack_id,
            'user_id' => Auth::user()->id,
            'content' => $content,
            'status' => $status
        ]);
    }

    public static function changeSubsectionStatus($subsection_id, $status, $content = '')
    {
        DB::table('subsection_histories')->insertGetId([
            'subsection_id' => $subsection_id,
            'user_id' => Auth::user()->id,
            'content' => $content,
            'status' => $status
        ]);
    }

    public static function changeBalanceStatus($balance_id, $status, $customer_id, $order_id, $price, $content = '')
    {
        DB::table('balance_histories')->insertGetId([
            'balance_id' => $balance_id,
            'customer_id' => $customer_id,
            'order_id' => $order_id,
            'price' => $price,
            'content' => $content,
            'user_id' => Auth::user()->id,
            'status' => $status
        ]);
    }

}
