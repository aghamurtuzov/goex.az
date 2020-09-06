<?php

namespace App\Http\Controllers;


use App\Http\Requests\TranslationGroupRequest;
use App\Http\Requests\TranslationRequest;
use App\Models\Translation;
use App\Models\TranslationGroup;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TranslationController extends Controller
{
	public function getTranslation()
	{
		$results = Translation::orderBy('id', 'desc')->where('delete',false)->paginate(20);

		$groups = TranslationGroup::where('delete',false)->get();

		return view("site-admin.translations.translation", ["results" => $results, 'groups' => $groups]);
	}

	public function getTranslationEdit($id)
	{
		$result = Translation::find($id);

		if($result){
			$result->value = json_decode($result->value,true);
		}

		$groups = TranslationGroup::where('delete',false)->get();

		return view("site-admin.translations.translation-edit", ["result" => $result, 'groups' => $groups]);
	}

	public function postTranslationEdit(TranslationRequest $request, $id)
	{
		$request->validated();
		$value = [
			'az' => $request->get('value_az'),
			'ru' => $request->get('value_ru'),
			'en' => $request->get('value_en'),
			'tr' => $request->get('value_tr'),
		];

		$message = !$id ? 'Tercume əlavə olundu' : 'Tercume redaktə olundu';

		$request->request->add(['value' => json_encode($value, JSON_UNESCAPED_UNICODE)]);

		$request->request->remove('value_az');
		$request->request->remove('value_ru');
		$request->request->remove('value_en');
		$request->request->remove('value_tr');

		BaseController::postModuleEdit($request, $id, 'translations', $message);

		return Redirect::back();
	}

	public function getTranslationExport()
	{
		$data = $this->getExportData();
		foreach ($data as $lang => $value) {
			$value = jsonEncodePretty($value);
			$path = public_path("langs/$lang.json");
			if (!file_exists($path)) {
				touch($path);
			}
			file_put_contents($path, $value);
		}

		Session::flash('export-message', 'Export');

		return Redirect::back();
	}


	public function getExportData()
	{
		$data = [];
		$translations = Translation::all();
		foreach ($translations as $translation) {
			$translationValues = json_decode($translation->value, 1);
			foreach ($translationValues as $translationKey => $translationValue) {
				$data[$translationKey][$translation->key] = $translationValue;
			}
		}

		return $data;
	}


	//GROUP
	public function getTranslationGroup()
	{
		$results = TranslationGroup::orderBy('id', 'desc')->where('delete',false)->paginate(20);

		return view("site-admin.translations.translation-group", ["results" => $results]);
	}

	public function getTranslationGroupEdit($id)
	{
		$result = TranslationGroup::find($id);

		return view("site-admin.translations.translation-group-edit", ["result" => $result]);
	}

	public function postTranslationGroupEdit(TranslationGroupRequest $request, $id)
	{
		$request->validated();

		$message = !$id ? 'Tercume qrupu əlavə olundu' : 'Tercume qrupu redaktə olundu';

		BaseController::postModuleEdit($request, $id, 'translation_groups', $message);

		return Redirect::back();
	}

}
