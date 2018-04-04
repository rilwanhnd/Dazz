<?php

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', 'HomeController@index');


    Route::post('/register-customer', 'CustomerController@registercustomer');
    Route::get('/customer', 'CustomerController@managecustomer');
    
    Route::get('/dashboard', 'DashboardController@homedashboard');
    Route::get('/job/{id}', 'DashboardController@job');
    
    
    Route::get('/downloadOrder', 'OrderController@downloadOrder');
    Route::get('/orders', 'OrderController@index');

    Route::get('/staff', 'StaffController@managestaff');
    Route::get('/settheme', 'StaffController@settheme');
    Route::post('/createnewstaff', 'StaffController@createnewstaff');
    Route::get('/verify', 'StaffController@verifyusername');
    Route::get('/getuserdetails', 'StaffController@getuserdetails');
    Route::post('/editstaff', 'StaffController@editstaff');
    Route::post('/deleteuser', 'StaffController@deleteuser');
    Route::get('/profile/{id}', 'StaffController@profile');
    Route::post('/edituser', 'StaffController@edituser');
    Route::post('/editimg', 'StaffController@editimg');
    Route::get('/verifypassword', 'StaffController@verifypassword');
    Route::post('/changepassword', 'StaffController@changepassword');
    Route::get('/skills', 'StaffController@manageskills');
    Route::post('/createnewskills', 'StaffController@createnewskills');
    Route::post('/editskill', 'StaffController@editskill');
    Route::post('/deleteskill', 'StaffController@deleteskill');

    Route::post('/addorder', 'CreateOrderController@addorder');

    Route::get('/CreateOrder', 'CreateOrderController@createorder');

    Route::get('/neworder', 'OrderController@neworder');
    Route::get('/getstaffname', 'OrderController@getstaffname');
    Route::post('/assignstaff', 'OrderController@assignstaff');
    Route::post('/cancelorder', 'OrderController@cancelorder');

    Route::get('/assigned', 'OrderController@assigned');
    Route::post('/reassignstaff', 'OrderController@reassignstaff');
    Route::get('/getnote', 'OrderController@getnote');
    Route::post('/ordernote', 'OrderController@ordernote');
    Route::post('/reaction', 'OrderController@reaction');
    Route::post('/submitfile', 'OrderController@submitfile');
    Route::post('/rejectorder', 'OrderController@rejectorder');
    Route::get('/rejectby', 'OrderController@rejectby');
    
    Route::get('/settings', 'SettingController@settings');
    Route::post('/savesetting', 'SettingController@savesetting');
    
    Route::get('/readmail', 'MailRead@readmail');
    Route::get('/removestyle', 'StaffController@removestyle');
    Route::post('/lastcomplete', 'OrderController@lastcomplete');
    
    Route::get('/completed', 'OrderController@completed');
    Route::get('/cencel', 'OrderController@cencel');
    
    Route::get('/staffcompleted', 'OrderController@staffcompleted');
    Route::get('/staffreject', 'OrderController@staffreject');
    
});
