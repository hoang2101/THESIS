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
Route::PoST('/manage','MainController@addUserMain')->name('addUserMainSubmit');
Route::get('/manageMainHotel','MainController@manageHotel')->name('mainManageHotel');

