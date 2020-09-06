<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Statement;

class StatementsController extends Controller
{

	public function getStatements()
	{
		$balances = Balance::where('delete', false)->get();

		$results = Statement::where('status', true)->paginate(20);

		return view('admin.statement.statements', ['results' => $results, 'balances' => $balances]);
	}


}
