<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\TariffRequest;
use App\Models\Country;
use App\Models\Filial;
use App\Models\Tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TariffController extends Controller
{
    public function getTariffes()
    {
        $results = Tariff::paginate(20);

        $countries = Country::where(['status' => true, 'delete' => false])->get();

        return view("admin.tariffes.tariffes", ['results' => $results, "countries" => $countries]);
    }

    public function getTariffesEdit(Request $request, $id)
    {
        $result = Tariff::find($id);

        $countries = Country::where(['status' => true, 'delete' => false])->get();

        return view('admin.tariffes.tariffes-edit', ['result' => $result, 'countries' => $countries]);
    }

    public function postTariffesEdit(TariffRequest $request, $id = 0)
    {
        $request->validated();

        $message = !$id ? ' əlavə olundu' : ' redaktə olundu';

        $request->request->add(['user_id' => Auth::user()->id]);

        BaseController::postModuleEdit($request, $id, 'tariffs', $message);

        return Redirect::back();
    }
}
