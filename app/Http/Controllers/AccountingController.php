<?php

namespace App\Http\Controllers;


use App\Exports\AccountingExport;
use App\Http\Requests\AboutRequest;
use App\Models\Orders;
use App\Models\Sack;
use App\Models\Section;
use App\Models\Stock;
use App\Models\SubSection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class AccountingController extends Controller
{
	public function getAccounting($type = 0)
	{
		$stocks = Stock::where('delete', false)->get();

		$sections = Section::where('delete', false)->get();

		$sub_sections = SubSection::where('delete', false)->get();

		$sacks = Sack::get();

		$results = Orders::with('customOrder')->orderBy('id', 'desc')->paginate(15);

		return view("admin.accounting.accounting", ['results' => $results, 'stocks' => $stocks, 'sections' => $sections, 'sub_sections' => $sub_sections, 'sacks' => $sacks]);
	}

	public function getAccountingDocumentCustoms()
	{
		$sacks = Sack::get();

		$results = Orders::where('delete', 1111)->paginate(20);

		return view("admin.accounting.document-customs", ['results' => $results, 'sacks' => $sacks]);
	}

	public function postAboutEdit(AboutRequest $request, $id)
	{
		$request->validated();

		$message = !$id ? 'About əlavə olundu' : 'About redaktə olundu';

		$request->request->add(['user_id' => Auth::user()->id]);

		BaseController::postModuleEdit($request, $id, 'abouts', $message);

		return Redirect::back();
	}

	public function export($results = [])
	{
		$export = new AccountingExport($results);

		return Excel::download($export, 'customs.xlsx');
	}

}
