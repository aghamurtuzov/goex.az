<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ShopController extends Controller
{
    public function getShop()
    {
        $results = Shop::orderBy('id','desc')->paginate(20);

        return view("site-admin.shop.shop", ["results" => $results]);
    }

    public function getEditShop($id)
    {
        $result = Shop::find($id);

        return view("site-admin.shop.shop-edit", ["result" => $result]);
    }

    public function postEditShop(ShopRequest $request, $id)
    {
        $request->validated();

        $message = !$id ? 'Shop əlavə olundu' : 'Shop redaktə olundu';

        $request->request->add(['user_id' => Auth::user()->id]);

        BaseController::postModuleEdit($request, $id, 'shops', $message);

        return Redirect::back();
    }
}
