<?php

namespace App\Http\Controllers;

use App\Http\Requests\SmsRequest;
use App\Http\Requests\SmsTemplateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\SmsTemplate;


class SmsTemplateController extends Controller
{
    public function getSmsTemplate()
    {
        $results = SmsTemplate::paginate(20);

        return view('admin.sms.sms-template', ['results' => $results]);
    }

    public function getSmsTemplateEdit(Request $request, $id)
    {
        $result = SmsTemplate::find($id);

        return view('admin.sms.smstemplate-add', ['result' => $result]);
    }

    public function postSmsTemplateEdit(SmsTemplateRequest $request, $id)
    {
        $request->validated();

        $message = !$id ? 'Sms template əlavə olundu' : 'Sms template redaktə olundu';

        BaseController::postModuleEdit($request, $id, 'sms_templates', $message);

        return Redirect::back();

    }


}
