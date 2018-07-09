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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
// Route::group(['middleware' => ['web']], function () {
	
// });
// Admin
Route::get('/admin', 'AdminController@admin')->name('admin');
Route::get('/media_group', 'AdminController@media_group')->name('media_group');
Route::get('/media', 'AdminController@media')->name('media');
Route::get('/recommended_menu', 'AdminController@recommended_menu')->name('recommended_menu');
Route::get('/user', 'AdminController@user')->name('user');
Route::get('/promotion','AdminController@promotion')->name('promotion');
Route::get('/reservations_table','AdminController@reservations_table')->name('reservations_table');
Route::get('/table','AdminController@table')->name('table');
Route::get('/report','AdminController@report')->name('report');
Route::get('/all_menus', 'AdminController@all_menus')->name('all_menus');
	//  End Admin