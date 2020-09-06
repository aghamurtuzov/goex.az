<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockRequest;
use App\Models\Stock;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StockController extends Controller
{
    public function getStocks($type = 0)
    {
        $results = Stock::where('type', $type)->paginate(20);

        $countries = Country::all();

        $cities = City::all();

        return view('admin.stock.stocks', ['results' => $results, "countries" => $countries, "cities" => $cities, 'type' => $type]);
    }

    public function getStockEdit(Request $request, $id)
    {
        $result = Stock::find($id);

        $countries = Country::where(['status' => true, 'delete' => false])->get();

        $cities = City::where(['status' => true, 'delete' => false])->get();

        return view('admin.stock.stock-edit', ['result' => $result, 'countries' => $countries, 'cities' => $cities]);
    }


    public function postStockEdit(StockRequest $request, $id = 0)
    {
        $request->validated();

        $message = !$id ? ' əlavə olundu' : ' redaktə olundu';

        $request->request->add(['user_id' => Auth::user()->id]);

        BaseController::postModuleEdit($request, $id, 'stocks', $message);

        return Redirect::back();
    }

}
