<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     
     
    public function index()
    {
        return view('admin.home');
    }
    public function users_list(){
        return view("admin.users.users-list");
    }
    public function order_list(){
        return view("admin.orders.order-list");
    }
    public function user_form(){
        return view("admin.users.user-form");
    }
    public function permission_role(){
        return view("admin.role.permission-role");
    }

    public function accounting(){
        return view("admin.accounting.accounting");
    }
    public function balance(){
        return view("admin.balances.balances-list");
    }
    public function customer(){
        return view("admin.customer.customer");
    }
    public function history(){
        return view("admin.history.history");
    }
    public function order_applies(){
        return view("admin.orders.order-applies");
    }
    public function priority(){
        return view("admin.priority.priority");
    }
    public function settings(){
        return view("admin.settings.settings");
    }

//    public function tariffes(){
//        return view("admin.tariffes.tariffes");
//    }
    public function corporative(){
        return view("admin.corporative.corporative");
    }
    public function customer_edit(){
        return view("admin.customer.customer-form");
    }
    public function priorty_form(){
        return view("admin.priorty.priorty-form");
    }
    public function balance_form(){
        return view("admin.balances.balances-form");
    }
    public function customer_profile(){
        return view("admin.customer.customer-profile");
    }


}
