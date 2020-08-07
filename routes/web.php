<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home')->middleware(['check-locked']);
Route::get('/locked_user', 'HomeController@locked_user')->name('locked_user');
Route::get('/admin_dashboard', 'HomeController@admin_dashboard')->middleware(['check-locked']);
Route::get('/home', 'HomeController@index')->middleware(['check-locked']);
Route::get('/getCcoordinates', 'HomeController@getCcoordinates')->middleware(['check-locked']);

Route::get('/setlockuser', 'HomeController@setlockuser');
Route::get('/deleteuser', 'HomeController@deleteuser');
Route::get('/deletecode', 'HomeController@deletecode');
Route::get('/reviewcode', 'HomeController@reviewcode');

Route::match(['get', 'post'],'/campaign', 'HomeController@campaign')->middleware(['check-locked']);
Route::get('/viewcampaigns/{function?}/{data?}', 'HomeController@viewcampaigns')->middleware(['check-locked']);


Auth::routes(['verify' => true]);

Route::get('/test', 'TestController@index');

Route::get('/track/{data}','WebController@track');
Route::get('/privacy-policy','WebController@privacypolicy');
Route::get('/terms-and-conditions','WebController@termsandconditions');
Route::get('/qrcode/{data}','WebController@qrcode');

Route::get('/getfile', 'HomeController@getfile')->name('getfile');
Route::match(['get', 'post'],'/profile', 'HomeController@profile');
Route::match(['get', 'post'],'/change-password', 'HomeController@changepassword');

