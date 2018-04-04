<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use DB;

class ConfigurationController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $configs = array(
            'ebay_developer_id' => \App\Configs::where('config_name', 'ebay_developer_id')->pluck('config_value')->first(),
            'ebay_application_id' => \App\Configs::where('config_name', 'ebay_application_id')->pluck('config_value')->first(),
            'ebay_certificate_id' => \App\Configs::where('config_name', 'ebay_certification_id')->pluck('config_value')->first(),
            'ebay_user_token' => \App\Configs::where('config_name', 'ebay_user_token')->pluck('config_value')->first(),
            'ebay_api_url' => \App\Configs::where('config_name', 'ebay_api_url')->pluck('config_value')->first(),
            'ebay_site_id' => \App\Configs::where('config_name', 'ebay_site_id')->pluck('config_value')->first(),
            'ebay_compatibility_level' => \App\Configs::where('config_name', 'ebay_compatibility')->pluck('config_value')->first(),
            'amazon_seller_id' => \App\Configs::where('config_name', 'amazon_seller_id')->pluck('config_value')->first(),
            'amazon_mws_auth_token' => \App\Configs::where('config_name', 'amazon_mws_auth_token')->pluck('config_value')->first(),
            'amazon_aws_access_key_id' => \App\Configs::where('config_name', 'amazon_aws_access_key_id')->pluck('config_value')->first(),
            'amazon_secret_key' => \App\Configs::where('config_name', 'amazon_secret_key')->pluck('config_value')->first(),
            'amazon_market_place_id' => \App\Configs::where('config_name', 'amazon_market_place_id')->pluck('config_value')->first(),
        );

        return view('configs')->with('configs', $configs);
    }

    public function update() {
        $input = Input::all();

        foreach ($input as $key => $value) {
            DB::table('configs')
                    ->where('config_name', $key)
                    ->update(array('config_value' => $value));
        }

        return response()->json(array('results' => 'success', 'response' => 'Configuration Updated'));
    }

}
