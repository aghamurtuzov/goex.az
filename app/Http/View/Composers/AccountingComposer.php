<?php

namespace App\Http\View\Composers;

use App\Models\Contact;
use App\Models\OrderHistory;
use App\Models\Orders;
use Illuminate\View\View;

class AccountingComposer
{

    public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
    	$data = [];

		$data['total'] = OrderHistory::where('status',7)->count();

		$data['day'] = OrderHistory::where('status',7)->whereDate('date',date('Y-m-d'))->count();

		$data['month'] = OrderHistory::where('status',7)->whereYear('date',date('Y'))->whereMonth('date',date('m'))->count();

		$data['year'] = OrderHistory::where('status',7)->whereYear('date',date('Y'))->count();

        $view->with('dataAccounting', $data);
    }
}