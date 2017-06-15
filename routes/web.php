<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('main.index');
// });
Route::get('/','MainController@index')->name('mainHome');
Auth::routes();
Route::get('/custommanage','MainController@manage')->name('mainManage');
Route::POST('/manageEdit','MainController@editUserMain')->name('editUserMainSubmit');
Route::POST('/custommanage','MainController@addUserMain')->name('addUserMainSubmit');

Route::get('/profile','MainController@prolife')->name('mainProfile');
Route::POST('/profile','MainController@editProlife')->name('mainProfileSubmit');

Route::POST('/hotelmanage','MainController@addHotelMain')->name('addHotelMainSubmit');
Route::get('/hotelmanage','MainController@manageHotel')->name('mainManageHotel');

//can gop managehoteler
Route::get('/managehoteler','MainController@manageHoteler')->name('mainManageHoteler');
Route::POST('/managehoteler','MainController@addHotelHoteler')->name('addHotelHotelerSubmit');

Route::get('/payment','MainController@paypal')->name('paypal');
Route::POST('/payment','MainController@paypalSubmit')->name('paypalSubmit');

Route::GET('/payresult','MainController@getDone')->name('paypaldone');
Route::GET('/payresult2','MainController@getCancel')->name('paypalcancel');


Route::get('/mhotelmanage','MainController@manageGovermHoteler')->name('mainManageGovermHoteler');
Route::POST('/mhotelmanage','MainController@addGovermHoteler')->name('addGovermHotelerSubmit');





Route::group(['subdomain' => '{subdomain}'], function () {
    Route::get('/{subdomain}', 'SubController@index' )->name('subHome');
    Route::POST('/{subdomain}', 'SubController@account' )->name('subHomesubmit');

     Route::get('/{subdomain}/booking/roomresult', 'SubController@roomResult' )->name('roomResult');
     Route::POST('/{subdomain}/booking/roomresult', 'SubController@editRoomResult' )->name('subRoomResultsubmit');
     Route::get('/{subdomain}/booking/payment', 'SubController@payment' )->name('subPayment');
     Route::get('/{subdomain}/congra', 'SubController@congra' )->name('subCongra');
     Route::get('/{subdomain}/payment','SubController@paypal')->name('subpaypal');
     Route::POST('/{subdomain}/payment','SubController@paypalSubmit')->name('subpaypalSubmit');
     Route::GET('/{subdomain}/payresult','SubController@getDone')->name('subpaypaldone');
     Route::GET('/{subdomain}/payresult2','SubController@getCancel')->name('subpaypalcancel');


    

    Route::get('/{subdomain}/profile', 'SubController@prolife' )->name('subProfile');
    Route::POST('/{subdomain}/profile', 'SubController@editProlife' )->name('subProfilesubmit');

    Route::get('/{subdomain}/custommanage', 'SubController@manage' )->name('subManage');
    Route::POST('/{subdomain}/custommanage', 'SubController@manageSubmit' )->name('subManageSubmit');

    Route::get('/{subdomain}/staffmanage', 'SubController@staffManage' )->name('subStaffManage');
    Route::POST('/{subdomain}/staffmanage', 'SubController@staffManageSubmit' )->name('subStaffManageSubmit');

    Route::get('/{subdomain}/config', 'SubController@configManage' )->name('subConfig');
    Route::POST('/{subdomain}/config', 'SubController@configManageSubmit' )->name('subConfigSubmit');

     Route::get('/{subdomain}/bookmanage', 'SubController@bookManage' )->name('subBookManage');
    Route::POST('/{subdomain}/bookmanage', 'SubController@bookManageSubmit' )->name('subBookManageSubmit');

    Route::get('/{subdomain}/roommanage', 'SubController@roomManage' )->name('subRoomManage');
    Route::POST('/{subdomain}/roommanage', 'SubController@roomManageSubmit' )->name('subRoomManageSubmit');

    Route::get('/{subdomain}/report', 'SubController@reportManage' )->name('subReportManage');
    Route::POST('/{subdomain}/report', 'SubController@reportManageSubmit' )->name('subReportManageSubmit');


});

// loi subcontroller  phan chekc dang nhap




