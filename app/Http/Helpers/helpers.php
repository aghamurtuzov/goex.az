<?php

use Illuminate\Support\Facades\App;

if (!function_exists('getOrderHistory')) {
	function getOrderHistory($status)
	{

		$text = false;
		switch ($status) {
			case 1:
				$text = translate('new');
				break;
			case 2:
				$text = translate('in_way');
				break;
			case 3:
				$text = translate('external_warehouse');
				break;
			case 4:
				$text = translate('internal_warehouse');
				break;
			case 5:
				$text = translate('problematic');
				break;
			case 6:
				$text = translate('returned');
				break;
			case 7:
				$text = translate('finished');
				break;
			case 8:
				$text = translate('transfer');;
				break;
			default:
				$text = "-";
		}

		return $text;
	}
}

if (!function_exists('getSubsectionHistory')) {
	function getSubsectionHistory($status)
	{
		$text = false;
		switch ($status) {
			case 0:
				$text = "Yaradildi";
				break;
			case 1:
				$text = "Edit edildi";
				break;
			case 2:
				$text = "Xaricde";
				break;
			case 3:
				$text = "Doludur";
				break;
			case 4:
				$text = "Silindi";
				break;
			default:
				$text = "-";
		}

		return $text;
	}
}

if (!function_exists('getSackHistory')) {
	function getSackHistory($status)
	{
		$text = false;
		switch ($status) {
			case 0:
				$text = "Yaradildi";
				break;
			case 1:
				$text = "Yolda";
				break;
			case 2:
				$text = "Xaricde";
				break;
			case 3:
				$text = "Daxilde";
				break;
			case 4:
				$text = "Silindi";
				break;
			default:
				$text = "-";
		}

		return $text;
	}
}

if (!function_exists('getBalanceHistory')) {
	function getBalanceHistory($status)
	{
		$text = false;
		switch ($status) {
			case 1:
				$text = translate('increase_balance');
				break;
			case 2:
				$text = translate('extract_balance');
				break;
			case 3:
				$text = translate('returned_balance');
				break;
			case 4:
				$text = translate('order');
				break;
			default:
				$text = "-";
		}

		return $text;
	}
}

if (!function_exists('getOrderLinkHistory')) {
	function getOrderLinkHistory($status)
	{
		$text = false;
		switch ($status) {
			case 1:
				$text = "Sebet";
				break;
			case 2:
				$text = "Odenildi";
				break;
			case 3:
				$text = "Sifaris verildi";
				break;
			case 4:
				$text = "Silindi";
				break;
			default:
				$text = "-";
		}

		return $text;
	}
}

if (!function_exists('getMonth')) {
	function getMonth($i)
	{
		$months = ['No month', 'Yanvar', 'Fevral', 'Mart', 'Aprel', 'May', 'İyun', 'İyul', 'Avqust', 'Sentyabr', 'Oktyabr', 'Noyabr', 'Dekabr'];
		return $months[$i] ?? '';
	}
}


function jsonEncodePretty($value)
{
	return json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
}

function translate($text)
{
	$translationKey = $text;
	$translationData = getLangJson();
	$translation = isset($translationData[$translationKey]) ? $translationData[$translationKey] : false;
	return $translation ? $translation : 'Tercume_et!key:' . $text;
}

function getLangJson()
{
	$locale = getLocale();
	$langFile = public_path("langs/$locale.json");
	$translationData = [];
	if (file_exists($langFile)) $translationData = json_decode(file_get_contents($langFile), 1);
	return $translationData;
}

function getLocale()
{
	$language = App::getLocale();
	return $language;
}

function getLanguageFlag()
{
	if (\Session::get('lng') == "az") {
		$path = "/site/img/az.png";
	} elseif (\Session::get('lng') == "tr") {
		$path = "/site/img/tr.png";
	} elseif (\Session::get('lng') == "ru") {
		$path = "/site/img/ru.jpg";
	} elseif (\Session::get('lng') == "en") {
		$path = "/site/img/en.png";
	} else {
		$path = "/site/img/az.png";

	}

	return $path;

}
