<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.2/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {
        Auth::user()->id;
        $Ipaddress = getHostByName(php_uname('n'));
        $logintime = date('m/d/Y h:i:s a', time());
        $login_history = new \App\LoginHistory();
        $login_history->user_id = Auth::user()->id;
        $login_history->ip_address = $Ipaddress;
        $login_history->logintime = $logintime;
        $login_history->save();

//        if (Auth::user()->status == 1) {
//            $neworder = \App\OrderItem::where('status', 0)->count();
//            $assigned = \App\OrderItem::where('status', 1)->count();
//            $completed = \App\OrderItem::where('status', 2)->count();
//            $cencel = \App\OrderItem::where('status', 3)->count();
//            session(['neworder' => $neworder, 'assigned' => $assigned, 'completed' => $completed, 'cencel' => $cencel]);
//            return \Redirect::to('neworder');
//        } else {
//            $neworder = 0;
//            $assigned = \App\OrderUser::join('orderitem', 'orderitem.id', '=', 'orderuser.orderitem_id')
//                            ->where('orderitem.status', 1)->count();
//            $completed = \App\OrderUser::join('orderitem', 'orderitem.id', '=', 'orderuser.orderitem_id')
//                            ->where('orderitem.status', 2)->count();
//            $cencel = \App\OrderUser::join('orderitem', 'orderitem.id', '=', 'orderuser.orderitem_id')
//                            ->where('orderitem.status', 3)->count();
//            session(['neworder' => $neworder, 'assigned' => $assigned, 'completed' => $completed, 'cencel' => $cencel]);
//            return \Redirect::to('assigned');
//        }
        return \Redirect::to('dashboard');
    }

}
