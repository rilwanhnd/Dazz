<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class ReportController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        $orders = \App\Order::all();
        return view('order')->with('orders', $orders);
    }

    public function getAmazonReport() {
        $amazonOperation = new \AmazonOperations();
        $amazonOperation->requestReport();
    }

}
