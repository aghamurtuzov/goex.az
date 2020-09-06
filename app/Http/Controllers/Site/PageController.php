<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\SiteApplyRequest;
use App\Http\Requests\SiteMailRequest;
use App\Http\Requests\SiteOrderRequest;
use App\Mail\SendMail;
use App\Models\About;
use App\Models\Annotation;
use App\Models\Apply;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Faq;
use App\Models\ForbiddenProduct;
use App\Models\Information;
use App\Models\OrderHistory;
use App\Models\OrderLink;
use App\Models\Orders;
use App\Models\Service;
use App\Models\Shop;
use App\Models\Slider;
use App\Models\Tariff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
	public function getHome()
	{
		$sliders = Slider::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->get();
		$services = Service::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->get();
		$informations = Information::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->limit(3)->get();
		$annotations = Annotation::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->get();
		$tariffs = Tariff::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->get();
		$shops = Shop::where(["status" => true, "delete" => false, "is_partner" => true])->orderBy('id', 'desc')->get();
		$countries = Country::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->get();
		$contacts = Contact::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->get();
		return view("site.home.home")->with([
			"sliders" => $sliders,
			"services" => $services,
			"informations" => $informations,
			"annotations" => $annotations,
			"tariffs" => $tariffs,
			"shops" => $shops,
			"countries" => $countries,
			"contacts" => $contacts
		]);
	}

	public function getAbout()
	{
		$abouts = About::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->first();
		return view("site.about.about")->with(["abouts" => $abouts]);
	}

	public function getServices()
	{
		$services = Service::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->get();
		return view("site.services.services")->with(["services" => $services]);
	}

	public function getCarriage()
	{
		$conditions = Condition::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->get();
		return view("site.carriages.carriage")->with(["conditions" => $conditions]);
	}

	public function getContact()
	{
		$contacts = Contact::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->get();
		return view("site.contact.contact")->with(["contacts" => $contacts]);
	}

	public function getFaq()
	{
		$faqs = Faq::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->get();
		return view("site.faq.faq")->with(["faqs" => $faqs]);
	}

	public function getForbidden()
	{
		$forbbidens = ForbiddenProduct::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->get();
		return view("site.forbidden.forbidden")->with(["forbiddens" => $forbbidens]);
	}

	public function getInformation()
	{
		$informations = Information::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->get();
		return view("site.information.information")->with(["informations" => $informations]);
	}

	public function getShop()
	{
		$shops = Shop::where(["status" => true, "delete" => false, "category_id" => true])->orderBy('id', 'desc')->get();
		$categorys = Category::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->get();
		return view("site.shops.shops")->with(["shops" => $shops, "categorys" => $categorys]);
	}

	public function getCountry()
	{
		$countries = Country::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->get();
		$tariffs = Tariff::where(["status" => true, "delete" => false])->orderBy('id', 'desc')->get();
		return view("site.country.country")->with(["countries" => $countries, "tariffs" => $tariffs]);
	}

	public function getInformationSingle($id)
	{

		$information = Information::find($id);
		return view("site.information.single")->with(["information" => $information]);
	}

	public function postSiteShop(Request $request)
	{
		try {
			$shops = Shop::where(["category_id" => $request->get("id"), "status" => true, "delete" => false])->orderBy('id', 'desc')->get();
			return response()->json([
				'status' => 'true',
				'error' => '',
				'success' => 200,
				"shops" => $shops,
			]);
		} catch (\Exception $e) {
			return response()->json(['status' => 'false', 'message' => $e->getMessage(), 'line' => $e->getLine()]);
		}

	}

	public function postSiteCountry(Request $request)
	{
		try {
			$tariff = Tariff::where(["country_id" => $request->get("id"), "status" => true, "delete" => false])->orderBy('id', 'desc')->get();
			return response()->json([
				'status' => 'true',
				'error' => '',
				'success' => 200,
				"tariff" => $tariff,
			]);
		} catch (\Exception $e) {
			return response()->json(['status' => 'false', 'message' => $e->getMessage(), 'line' => $e->getLine()]);
		}

	}

	public function postContact(SiteMailRequest $request)
	{
		$request->validated();
		try {
			$fullname = $request->fullname;
			$email = $request->email;
			$phone = $request->phone;
			$message = $request->message;

			Mail::to("info@goex.az")->send(new SendMail($fullname, $phone, $email, $message));
			return response()->json(["status" => "success", "title" => " ", "content" => "Mesajınız göndərildi"]);
		} catch (\Exception $e) {
			return response()->json(["status" => "error", "title" => "Xəta", "content" => "Bir xəta yarandı!"]);
		}
	}


	public function lng($lng)
	{
		Session::put('lng', $lng);

		return redirect()->back();
	}

	public function postOrder(SiteOrderRequest $request)
	{
		$request->validated();
		try {
			for ($i = 0; $i < count($request->get('link')); $i++) {


				$total_price = (($request->get('product_price')[$i] + $request->get('kargo_price')[$i]) * 2.5) / 100;

				$order = OrderLink::create([
					'situation' => 1,
					'customer_id' => Auth::guard("customers")->user()->id,
					'link' => $request->get('link')[$i],
					'product_name' => $request->get('product_name')[$i],
					'quantity' => $request->get('quantity')[$i],
					'product_size' => $request->get('product_size')[$i],
					'check' => $request->get('check')[$i],
					'color' => $request->get('color')[$i],
					'product_price' => $request->get('product_price')[$i],
					'kargo_price' => $request->get('kargo_price')[$i],
					'total_price' => $total_price,
					'description' => $request->get('description')[$i],
//					'price_status' => $request->get('price_status'),
//					'width' => $request->get('width')[$i],
//					'length' => $request->get('length')[$i],
//					'value' => $price,
//					'weight' => $request->get('weight')[$i],
//					'depth' => $request->get('depth')[$i],
//					'follow_code' => rand(10000000, 99999999),
//					'position' => 0,
//					'category' => 2
				]);

				//history
				BaseController::changeOrderStatus($order->id, 1, $request->get('description')[$i]);

			}

			Session::put('type_active', 1);

			return redirect()->back()->with('success-message', 'Sifarişiniz göndərildi');
		} catch (\Exception $e) {
			return redirect()->back()->with('success-error', 'Bir xeta yarandi ' . $e);
		}

	}

	public function postApply(SiteApplyRequest $request)
	{
		$request->validated();

		try {

			Apply::create([
				'category_id' => $request->get('category_id'),
				'country_id' => $request->get('country_id'),
				'message' => $request->get('message'),
				'attachment' => $request->get('attachment'),
			]);

			return redirect()->back()->with('success-message', 'Müraciətiniz qeydə alındı');
		} catch (\Exception $e) {
			return redirect()->back()->with('success-error', 'Bir xeta yarandi ' . $e);
		}

	}

}
