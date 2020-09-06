<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForbiddenProductRequest;
use App\Models\ForbiddenProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ForbiddenProductController extends Controller
{
    public function getForbiddenProduct()
    {
        $results = ForbiddenProduct::orderBy('id','desc')->paginate(20);

        return view("site-admin.forbiddenProduct.forbidden-product", ["results" => $results]);
    }

    public function getForbiddenProductEdit($id)
    {
        $result = ForbiddenProduct::find($id);

        return view("site-admin.forbiddenProduct.forbidden-product-edit", ["result" => $result]);
    }

    public function postForbiddenProductEdit(ForbiddenProductRequest $request, $id)
    {
        $request->validated();

        $message = !$id ? 'Qadagan olunan mallar əlavə olundu' : 'Qadagan olunan mallar redaktə olundu';

        $request->request->add(['user_id' => Auth::user()->id]);

        BaseController::postModuleEdit($request, $id, 'forbidden_products', $message);

        return Redirect::back();
    }
}
