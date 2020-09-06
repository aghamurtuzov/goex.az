<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\Section;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Requests\SectionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SectionController extends Controller
{

    public function getSections($stock_id = false)
    {

        $results = Section::orderBy('id','ASC');

        if($stock_id){
			$results = $results->where('stock_id',$stock_id);
		}

		$results = $results->paginate(20);

        $stocks = Stock::all();

        return view('admin.sections.section', ['results' => $results, "stocks" => $stocks]);
    }

    public function getSectionEdit(Request $request, $id)
    {
        $result = Section::find($id);

        $stocks = Stock::where(['status' => true, 'delete' => false])->get();

        return view('admin.sections.section-edit', ['result' => $result, 'stocks' => $stocks]);
    }


    public function postSectionEdit(SectionRequest $request, $id = 0)
    {
        $request->validated();

        $message = !$id ? ' əlavə olundu' : ' redaktə olundu';

        $request->request->add(['user_id' => Auth::user()->id]);

        BaseController::postModuleEdit($request, $id, 'sections', $message);

        return Redirect::back();
    }


}
