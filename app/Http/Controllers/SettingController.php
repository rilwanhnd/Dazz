<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use File;

class SettingController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $orders = \App\Order::all();
        return view('order')->with('orders', $orders);
    }
    public function settings(){
        $settings =  \App\Configs::first();
//        print_r($settings);die;
         return view('settings')->with('settings', $settings);
    }
    public function savesetting(){
//        print_r(Input::get());
//        echo Input::get('portname');die;
        $mail =Input::get('username');
        \App\Configs::where('id',1)->update(array(
                'mailaddress' => $mail,
            'host'=>Input::get('host'),
            'port'=>Input::get('portname'),
            'password'=>Input::get('password'),));
        return \Redirect::to('settings');
    }

}
