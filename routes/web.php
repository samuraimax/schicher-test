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

// Example Routes
Route::redirect('/', function () {
    return redirect()->route('backend.auth.login');
});
Route::match(['get', 'post'], '/dashboard', function(){
    return view('dashboard');
});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');

Route::prefix('backend')->group(function () {
    Route::get('/login', 'backend\Auth\AuthController@login')->name('backend.auth.login');
    Route::post('/checklogin', 'backend\Auth\AuthController@checklogin')->name('backend.auth.checklogin');
    Route::get('/logout', 'backend\Auth\AuthController@logout')->name('backend.auth.logout');
    Route::get('/user/selecttent', 'backend\UserController@selecttent')->name('backend.user.selecttent');
});

Route::get('/home', 'HomeController@index')->name('home');
