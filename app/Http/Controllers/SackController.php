<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductAddSackRequest;
use App\Http\Requests\SackRequest;
use App\Models\Address;
use App\Models\Balance;
use App\Models\Customer;
use App\Models\Filial;
use App\Models\Orders;
use App\Models\Sack;
use App\Models\Section;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SackController extends Controller
{

	public function getSacks($position = null, $stock_id = false)
	{
		$results = new Sack();

		$position = self::position($results, $position);

		$results = $results->where('position', $position)->paginate(20);

		if ($stock_id) {
			$results = $results->where('stock_id', $stock_id);
		}

		$stocks = Stock::where(['status' => true, 'delete' => false])->get();

		return view('admin.sack.sacks', ['results' => $results, "stocks" => $stocks, "position" => $position]);
	}

	public static function position($results, $position)
	{
		$position = $position == null ? 0 : $position;

		return [
			'count' => $position,
			'first' => $results->where('position', 0)->count(),
			'second' => $results->where('position', 1)->count(),
			'third' => $results->where('position', 2)->count(),
		];
	}


	public function getSackView($id)
	{
		$sack = Sack::with('orders', 'histories', 'user')->findOrFail($id);

		$filials = Filial::all();

		return view('admin.sack.sack-view', ['sack' => $sack, 'filials' => $filials]);
	}

	public function getSackEdit(Request $request, $id)
	{
		$result = Section::find($id);

		$stocks = Stock::where(['status' => true, 'delete' => false, 'type' => true])->get();

		return view('admin.sack.sack-edit', ['result' => $result, 'stocks' => $stocks]);
	}


	public function postSackEdit(SackRequest $request, $id = 0)
	{
		$request->validated();

		$message = !$id ? 'Çuval əlavə olundu' : 'Çuval redaktə olundu';

		$request->request->add(['user_id' => Auth::user()->id]);

		$sack_id = BaseController::postModuleEdit($request, $id, 'sacks', $message);

		BaseController::changeSackStatus($sack_id, !$id ? 0 : 1); //yaradildi

		return Redirect::back();
	}

	//add product
	public function getSackProductAdd($id = null)
	{
		$sacks = Sack::where(['status' => true, 'delete' => false])->get();

		$addresses = Address::where('delete', false)->get();

		$balances = Balance::where('delete', false)->get();

		return view('admin.sack.product', ['sacks' => $sacks, 'addresses' => $addresses, 'balances' => $balances]);
	}

	public function postSackProductAdd(ProductAddSackRequest $request, $id = 0)
	{
		$request->validated();

		$message = !$id ? 'Product əlavə olundu' : 'Product redaktə olundu';

		$customer = Customer::where('customer_code', $request->get('customer_code'))->first();
		if (!$customer) {
			return "Customer tapilmadi";
		}
		$request->request->remove('customer_code');

		$sack = Sack::find($request->get('sack_id'));

		$stock_id = $sack->StockName ? $sack->StockName->id : 0;

		$tracking_code = 'g' . rand(1000000000, 9999999999);
		$follow_code = 'g' . rand(1000000000, 9999999999);
		$chargeable_weigth = ($request->width * $request->height * $request->depth) / 6000;

		$request->request->add([
			'chargeable_weigth' => $chargeable_weigth,
			'stock_id' => $stock_id,
			'customer_id' => $customer->id,
			'confirmation' => Auth::user()->id,
			'situation' => 1,
			'category' => 0,
			'follow_code' => $follow_code,
			'tracking_code' => $tracking_code,
			'publish_date' => Carbon::now(),
			'delivery_price' => ($request->get('width') * $request->get('width') * $request->get('width')) / 3600,
			'total_price' => $request->get('quantity') * $request->get('product_price'),
			'is_edit' => false,
		]);

		$order_id = BaseController::postModuleEdit($request, $id, 'orders', $message);

		BaseController::changeOrderStatus($order_id, 1); //yaradildi

		BaseController::changeOrderStatus($order_id, 2); //yaradildi

		$order = Orders::find($order_id);

		return view('admin.sack.product-print', ['order' => $order]);
	}


	public function postSackChangeProductPosition(Request $request, $id)
	{

		$sack = Sack::with('orders')->find($id);

		$sack->position = $request->get('position');

		$sack->is_full = $request->get('is_full') ? 1 : 0;

		$sack->save();

		//product yoldadir olur hamisi

		$sack->orders()->update([
			'situation' => 3
		]);

		foreach ($sack->orders() as $o) {
			DB::table('order_histories')->insertGetId([
				'order_id' => $o->id,
				'user_id' => Auth::user()->id,
				'status' => 3 // yolda
			]);
		}

		Session::flash('success-message', 'Position update olundu');

		return Redirect::back();
	}

	//add product
	public function getSackTransferProduct()
	{
		$sacks = Sack::where(['status' => true, 'delete' => false])->get();

		return view('admin.sack.product-transfer', ['sacks' => $sacks]);
	}

	public function postSackTransferProduct(Request $request)
	{
		$message = 'Transfer olundu';

		$order = Orders::where('barcode', $request->get('barcode'))->where('delete', false)->first();

		if (!$order) {
			return "Sifaris tapilmadi";
		}

		$sack = Sack::find($request->get('sack_id'));

		$stock_id = $sack->StockName ? $sack->StockName->id : 0;

		$order->update([
			'stock_id' => $stock_id,
			'sack_id' => $request->get('sack_id')
		]);

		Session::flash('success-message', $message);

		BaseController::changeOrderStatus($order->id, 5); //yaradildi

		return Redirect::back();
	}

	public function postSackDelete(Request $request, $id)
	{
		$request->request->add(['user_id' => Auth::user()->id]);

		$sack = Sack::with('orders')->find($id);
		if ($sack && !count($sack->orders)) {
			Sack::where('id', $id)->update([
				'delete' => false
			]);
			Session::flash('success-message', 'Cuval silindi');
			BaseController::changeSackStatus($id, 4); //yaradildi
		} else {
			Session::flash('success-error', 'Cuvali sile bilmezsiniz. Evvelce daxilinde olan sifarisleri silin ve ya basqa cuvala transfer edin');
		}
		return Redirect::back();
	}


}
