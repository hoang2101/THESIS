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
Route::get('/manage','MainController@manage')->name('mainManage');
Route::POST('/manageEdit','MainController@editUserMain')->name('editUserMainSubmit');
Route::POST('/manage','MainController@addUserMain')->name('addUserMainSubmit');

Route::POST('/manageMainHotel','MainController@addHotelMain')->name('addHotelMainSubmit');
Route::get('/manageMainHotel','MainController@manageHotel')->name('mainManageHotel');

Route::get('/managehoteler','MainController@manageHoteler')->name('mainManageHoteler');
Route::POST('/managehoteler','MainController@addHotelHoteler')->name('addHotelHotelerSubmit');

Route::get('/managegovermhoteler','MainController@manageGovermHoteler')->name('mainManageGovermHoteler');
Route::POST('/managegovermhoteler','MainController@addGovermHoteler')->name('addGovermHotelerSubmit');

Route::group(['domain' => '{subdomain}'], function () {
    Route::get('/{subdomain}', 'SubController@index' )->name('subHome');
});






