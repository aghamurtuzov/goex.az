<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductAddSubSectionRequest;
use App\Http\Requests\SubSectionRequest;
use App\Models\Orders;
use App\Models\Section;
use App\Models\Stock;
use App\Models\SubSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SubSectionController extends Controller
{
	public function getSubSections($section_id = false)
	{
		$results = SubSection::orderBy('id','ASC');

		if($section_id){
			$results = $results->where('section_id',$section_id);
		}

		$results = $results->paginate(20);

		$sections = Section::all();

		return view('admin.subsection.subsection', ['results' => $results, "sections" => $sections]);
	}


	public function getSubSectionEdit(Request $request, $id)
	{
		$result = SubSection::find($id);

		$sections = Section::where(['status' => true, 'delete' => false])->get();

		return view('admin.subsection.subsection-edit', ['result' => $result, 'sections' => $sections]);
	}


	public function postSubSectionEdit(SubSectionRequest $request, $id = 0)
	{
		$request->validated();

		$message = !$id ? ' əlavə olundu' : ' redaktə olundu';

		$request->request->add(['user_id' => Auth::user()->id]);

		$subsection_id = BaseController::postModuleEdit($request, $id, 'sub_sections', $message);

		BaseController::changeSubsectionStatus($subsection_id, !$id ? 0 : 1); //yaradildi

		return Redirect::back();
	}


	//add product
	public function getSubSectionAddProduct($id = null)
	{
		$subSections = Subsection::where(['status' => true, 'delete' => false])->get();

		return view('admin.subsection.product', ['subSections' => $subSections]);
	}

	public function postSubSectionAddProduct(ProductAddSubSectionRequest $request, $id = 0)
	{
		$request->validated();

		$message = !$id ? 'Sifariş əlavə olundu' : 'Sifariş redaktə olundu';

		$order = Orders::where('barcode', $request->get('barcode'))->where('delete', false)->first();

		if (!$order) {
			return "Sifaris tapilmadi";
		}

		$subSection = SubSection::find($request->get('subsection_id'));

		$stock_id = $subSection && $subSection->SectionName && $subSection->SectionName->StockName ? $subSection->SectionName->StockName->id : 0;

		$section_id = $subSection ? $subSection->SectionName->id : 0;

		$order->update([
			'situation' => 4,
			'sack_id' => null,
			'stock_id' => $stock_id,
			'section_id' => $section_id,
			'subsection_id' => $request->get('subsection_id'),
		]);

		Session::flash('success-message', $message);

		BaseController::changeOrderStatus($order->id, 4); //yaradildi

		return Redirect::back();
	}

	public function postProductForBarcode(Request $request)
	{
		try {

			$barcode = $request->get('barcode');

			$order = Orders::where('barcode', $barcode)->where('status', true)->where('delete', false)->first();


		} catch (\Exception $e) {

			return response()->json(['status' => 'error', 'error' => $e->getMessage()]);
		}


		return response()->json(['status' => 'success', 'error' => '', 'order' => $order]);

	}


	public function getSubSectionView($id)
	{
		$subsection = SubSection::with('orders', 'histories', 'user')->find($id);

		return view('admin.subsection.subsection-view', ['subsection' => $subsection]);
	}

	//add product
	public function getSubSectionTransferProduct()
	{
		$subSections = Subsection::where(['status' => true, 'delete' => false])->get();

		return view('admin.subsection.product-transfer', ['subSections' => $subSections]);
	}

	public function postSubSectionTransferProduct(Request $request)
	{
		$message = 'Transfer olundu';

		$order = Orders::where('barcode', $request->get('barcode'))->where('delete', false)->first();

		if (!$order) {
			return "Sifaris tapilmadi";
		}

		$subSection = SubSection::find($request->get('subsection_id'));

		$stock_id = $subSection && $subSection->SectionName && $subSection->SectionName->StockName ? $subSection->SectionName->StockName->id : 0;

		$section_id = $subSection ? $subSection->SectionName->id : 0;

		$order->update([
			'stock_id' => $stock_id,
			'section_id' => $section_id,
			'subsection_id' => $request->get('subsection_id'),
		]);

		Session::flash('success-message', $message);

		BaseController::changeOrderStatus($order->id, 5); //yaradildi

		return Redirect::back();
	}

}
