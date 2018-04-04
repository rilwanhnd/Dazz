<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Session;
use Hash;
class CustomerController extends Controller {

    public function registercustomer() {

        $user = new \App\User();
        $user->name = Input::get('name');
        $user->lastname = Input::get('lastname');
        $user->password = Hash::make(Input::get('password'));
        $user->email = Input::get('email');
        $user->phonenumber = Input::get('contactnumber');
        $user->cpassword = md5(Input::get('password'));
        $user->status=3;
        $user->save();
        $userid = $user->id;
         return \Redirect::to("/");
    }
    
    
     public function managecustomer() {
        //whereBetween('status', array(0, 1))
        $details = \App\User::where('status',3 )
                ->Orderby('status', 'desc')
                ->get();
       $staff_works=array();
        return view('customer/managecustomer')->with(array('staff_details' => $details, 'staff_works' => $staff_works));
    }


    //
}
