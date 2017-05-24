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

Route::get('/mhotelmanage','MainController@manageGovermHoteler')->name('mainManageGovermHoteler');
Route::POST('/mhotelmanage','MainController@addGovermHoteler')->name('addGovermHotelerSubmit');



Route::group(['subdomain' => '{subdomain}'], function () {
    Route::get('/{subdomain}', 'SubController@index' )->name('subHome');
    Route::POST('/{subdomain}', 'SubController@account' )->name('subHomesubmit');

    Route::get('/{subdomain}/profile', 'SubController@prolife' )->name('subProfile');
    Route::POST('/{subdomain}/profile', 'SubController@editProlife' )->name('subProfilesubmit');

    Route::get('/{subdomain}/custommanage', 'SubController@manage' )->name('subManage');
    Route::POST('/{subdomain}/custommanage', 'SubController@manageSubmit' )->name('subManageSubmit');

    Route::get('/{subdomain}/staffmanage', 'SubController@staffManage' )->name('subStaffManage');
    Route::POST('/{subdomain}/staffmanage', 'SubController@staffManageSubmit' )->name('subStaffManageSubmit');

    Route::get('/{subdomain}/config', 'SubController@configManage' )->name('subConfig');
    Route::POST('/{subdomain}/config', 'SubController@configManageSubmit' )->name('subConfigSubmit');


});

// loi subcontroller  phan chekc dang nhap




