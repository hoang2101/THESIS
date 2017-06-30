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
Route::post('resetPassword', 'Auth\ResetPasswordController@reset')->name('resetHome');
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

Route::GET('/report','MainController@report')->name('mainReport');
Route::POST('/report','MainController@reportsubmit')->name('mainReportSubmit');


Route::get('/mhotelmanage','MainController@manageGovermHoteler')->name('mainManageGovermHoteler');
Route::POST('/mhotelmanage','MainController@addGovermHoteler')->name('addGovermHotelerSubmit');





Route::group(['domain' => '{subdomain}.hotelsaas.com'],function () {
    Route::get('/hotel', 'SubController@index' )->name('subHome');
    Route::POST('/hotel', 'SubController@account' )->name('subHomesubmit');

     Route::get('/hotel/booking/roomresult', 'SubController@roomResult' )->name('roomResult');
     Route::POST('/hotel/booking/roomresult', 'SubController@editRoomResult' )->name('subRoomResultsubmit');
     Route::get('/hotel/booking/payment', 'SubController@payment' )->name('subPayment');
     Route::get('/hotel/congra', 'SubController@congra' )->name('subCongra');
     Route::get('/hotel/payment','SubController@paypal')->name('subpaypal');
     Route::POST('/hotel/payment','SubController@paypalSubmit')->name('subpaypalSubmit');
     Route::GET('/hotel/payresult','SubController@getDone')->name('subpaypaldone');
     Route::GET('/hotel/payresult2','SubController@getCancel')->name('subpaypalcancel');



    Route::get('/hotel/profile', 'SubController@prolife' )->name('subProfile');
    Route::POST('/hotel/profile', 'SubController@editProlife' )->name('subProfilesubmit');

     Route::get('/hotel/spend', 'SubController@spendManage' )->name('subSpendManage');
    Route::POST('/hotel/spend', 'SubController@spendManageSubmit' )->name('subSpendManageSubmit');

    Route::get('/hotel/custommanage', 'SubController@manage' )->name('subManage');
    Route::POST('/hotel/custommanage', 'SubController@manageSubmit' )->name('subManageSubmit');

    Route::get('/hotel/staffmanage', 'SubController@staffManage' )->name('subStaffManage');
    Route::POST('/hotel/staffmanage', 'SubController@staffManageSubmit' )->name('subStaffManageSubmit');

    Route::get('/hotel/config', 'SubController@configManage' )->name('subConfig');
    Route::POST('/hotel/config', 'SubController@configManageSubmit' )->name('subConfigSubmit');

     Route::get('/hotel/bookmanage', 'SubController@bookManage' )->name('subBookManage');
    Route::POST('/hotel/bookmanage', 'SubController@bookManageSubmit' )->name('subBookManageSubmit');

    Route::get('/hotel/roommanage', 'SubController@roomManage' )->name('subRoomManage');
    Route::POST('/hotel/roommanage', 'SubController@roomManageSubmit' )->name('subRoomManageSubmit');

    Route::get('/hotel/servicemanage', 'SubController@serviceManage' )->name('subServiceManage');
    Route::POST('/hotel/servicemanage', 'SubController@serviceManageSubmit' )->name('subServiceManageSubmit');

    Route::get('/hotel/report', 'SubController@reportManage' )->name('subReportManage');
    Route::POST('/hotel/report', 'SubController@reportManageSubmit' )->name('subReportManageSubmit');

    Route::get('/hotel/historybook', 'SubController@historyBook' )->name('subHistoryBook');
    Route::POST('/hotel/historybook', 'SubController@historyBookSubmit' )->name('subHistoryBookSubmit');


});

// loi subcontroller  phan chekc dang nhap




