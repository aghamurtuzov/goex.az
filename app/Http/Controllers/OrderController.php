<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCommentRequest;
use App\Models\Customer;
use App\Models\OrderHistory;
use App\Models\OrderLink;
use App\Models\Orders;
use App\Models\Sack;
use App\Models\Section;
use App\Models\Stock;
use App\Models\SubSection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
	public function getOrderLinks($situation = 0)
	{
		$results = OrderLink::with('customName');
		if ($situation) {
			$results = $results->where(['situation' => $situation]);
		}
		$results = $results->orderBy('id', 'desc')->paginate(20);

		return view('admin.order-links.order-links', ['results' => $results]);
	}

	public function getOrderLinkInfo($id)
	{
		$result = OrderLink::find($id);

		return view('admin.order-links.order-link-info', ['result' => $result]);
	}

	public function postOrderLinkEdit(Request $request, $id)
	{
		try {
			OrderLink::find($id)->update([
				'situation' => $request->get('situation'),
			]);

			//history
			BaseController::changeOrderStatus($id, 1, $request->get('comment'));

			return Redirect::back()->with('success-message', 'Sifariş linki redaktə olundu');
		} catch (\Exception $e) {
			return Redirect::back()->with('success-error', 'Sifariş linki redaktə olunması zaman xəta baş verdi' . $e);

		}
	}

	public function order_list($situation = 'all')
	{
		if ($situation == 'all') {
			$results = Orders::with('customOrder')->orderBy('id', 'desc')->paginate(15);
		} else {
			$results = Orders::with('customOrder')->where(['situation' => $situation])->orderby('id', 'desc')->paginate(15);
		}

		return view('admin.orders.order-list', ['results' => $results]);
	}

	public function getProducts()
	{
		$stocks = Stock::where('delete', false)->get();

		$sections = Section::where('delete', false)->get();

		$sub_sections = SubSection::where('delete', false)->get();

		$sacks = Sack::get();

		$results = Orders::with('customOrder')->orderBy('id', 'desc')->paginate(15);

		return view('admin.orders.order-products', ['results' => $results, 'stocks' => $stocks, 'sections' => $sections, 'sub_sections' => $sub_sections, 'sacks' => $sacks]);
	}

	public function getStockOrSackOrders($type = 'stock')
	{
		$type_o = $type == 'stock' ? false : true;

		$situation = $type == 'stock' ? 4 : 2;

		$stocks = Stock::where('delete', false)->where('type', $type_o)->get();

		$sections = Section::where('delete', false)->get();

		$sub_sections = SubSection::where('delete', false)->get();

		$sacks = Sack::where('delete', false)->get();

		$stock = Stock::where('type', $type_o)->first();

		if ($stock) {
			$stock = $stock->setRelation('orders', $stock->orders()->where('situation', $situation)->paginate(20));
		}

		$results = $stock->orders;

		return view('admin.orders.order-sack-stock', ['results' => $results, 'type' => $type, 'situation' => $situation, 'stocks' => $stocks, 'sections' => $sections, 'sub_sections' => $sub_sections, 'sacks' => $sacks]);
	}


	public function order_customer($situation = 'all')
	{
		if ($situation == 'all') {
			$results = Orders::with('customOrder')->where(['category' => 1])->orderBy('id', 'desc')->paginate(15);
		} else {
			$results = Orders::with('customOrder')->where(['situation' => $situation, 'category' => 1])->orderby('id', 'desc')->paginate(15);
		}

		return view('admin.orders.order-customer', ['results' => $results]);
	}

	public function order_link($situation = 'all')
	{
		if ($situation == 'all') {
			$results = Orders::with('customOrder')->where(['category' => 2])->orderBy('id', 'desc')->paginate(15);
		} else {
			$results = Orders::with('customOrder')->where(['situation' => $situation, 'category' => 2])->orderby('id', 'desc')->paginate(15);
		}

		return view('admin.orders.order-link', ['results' => $results]);
	}

	public function order_info($id)
	{
		$result = Orders::find($id);

		$historys = OrderHistory::where('order_id', $id)->get();

		return view('admin.orders.order-info', ['result' => $result, 'historys' => $historys]);
	}


	public function order_comment(OrderCommentRequest $request, $id)
	{
		try {

			Orders::find($id)->update([
				'comment' => $request->get('comment')
			]);
			return Redirect::back()->with('success-message', 'Şərh əlavə olundu');
		} catch (\Exception $e) {
			return Redirect::back()->with('success-error', 'Şərh əlavə olunması zaman xəta baş verdi');

		}
	}

	public function order_edit(Request $request, $id)
	{
		try {
			$customer_code = $request->get('customer_code');

			$customer_id = Customer::where('customer_code', $customer_code)->first()->id;

			Orders::find($id)->update([
				'situation' => $request->get('situation'),
				'product_type' => $request->get('product_type'),
				'customer_id' => $customer_id,
				'comment' => $request->get('comment'),
			]);

			//history
			BaseController::changeOrderStatus($id, 1, $request->get('comment'));


			return Redirect::back()->with('success-message', 'Sifariş redaktə olundu');
		} catch (\Exception $e) {
			return Redirect::back()->with('success-error', 'Sifariş redaktə olunması zaman xəta baş verdi' . $e);

		}
	}

	public function order_pdf($id)
	{
		try {
//            $items = Orders::find($id);
//
//            $pdf = PDF::loadView('pdfview');
//
//            $pdf->download('pdfview.pdf');
//
//            return Redirect::back()->with('success-message', 'Sifariş Pdf formatda yükləndi');
//            $pdf = PDF::loadFile('admin.orders.order-info');
			$result = Orders::find($id)->toArray();
			$pdf = app('dompdf.wrapper');
			$pdf->loadView('admin.orders.order-info' . ['result' => $result]);
			$fileName = 'agha';
			return $pdf->stream($fileName . '.pdf');

//            return "salam";
//            return $pdf->download('itsolutionstuff.pdf');
		} catch (\Exception $e) {
			return Redirect::back()->with('success-error', 'Sifariş Pdf formatda yüklənən zaman xəta yarandı' . $e);

		}
	}

}
