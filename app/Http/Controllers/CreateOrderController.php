<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use File;

class CreateOrderController extends Controller {

    public function createorder() {
        $staff_works = \App\UserRole::where('status', 0)->get();
        return view('manage_order')->with(array('staff_works' => $staff_works));
        
    }

    public function addorder() {
        $Order = new \App\Order();
        $Order->customer_name = Input::get('name');
        $Order->need_by_date = Input::get('needbydate');
        $Order->address = Input::get('address');
        $Order->tel = Input::get('phonenumber');
        $Order->message = Input::get('message');
        $Order->email=Input::get('email');
        $Order->save();
        $orderid = $Order->id;
        $task = Input::get('photestyle');
//        foreach ($tasks as $task) {
            $OrderItem = new \App\OrderItem();
            $OrderItem->order_id = $orderid;
            $OrderItem->userrole_id = $task;
            $OrderItem->save();
//        }
        $path = public_path('orderfiles') . '/' . $orderid;
        File::makeDirectory($path, $mode = 0777, true, true);

//        if (Input::hasFile('originalfile')) {
//            $file = Input::file("originalfile");
//            $size = $file->getClientSize();
//            $type = $file->getClientMimeType();
//
//            $filename = $file->getClientOriginalName();
//            $extension = $file->getClientOriginalExtension();
//            $uploadSuccess = $file->move($path, $filename);
//
//            \App\Order::where('id', $orderid)->update(array(
//                'file_name' => $filename,
//                'size' => $size,
//                'file_type' => $type,
//                'image_path' => 'orderfiles/'.$orderid . '/' . $filename
//            ));
//        }
              $output_image_path = '';
        if (Input::hasFile('originalfile')) {
            $files = Input::file("originalfile");
            foreach ($files as $file) {
                $size = $file->getClientSize();
                $type = $file->getClientMimeType();
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $uploadSuccess = $file->move($path, $filename);
                $output_image_path .='orderfiles/' . $orderid . '/' . $filename . ',';
            }
            \App\Order::where('id', $orderid)->update(array(
                'file_name' => $filename,
                'size' => $size,
                'file_type' => $type,
                'image_path' => $output_image_path
            ));
        }
          return \Redirect::to('neworder');
    }

}
