<?php

// use App\Http\Controllers\AdminController;

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

Route::get('/', 'App\Http\Controllers\UserController@index')->name('UserIndex');
Route::get('about', 'App\Http\Controllers\UserController@about')->name('about');
Route::get('pantai', 'App\Http\Controllers\UserController@pantai')->name('pantai');
Route::get('gunung', 'App\Http\Controllers\UserController@gunung')->name('gunung');
Route::get('taman_wisata', 'App\Http\Controllers\UserController@taman_wisata')->name('taman_wisata');
Route::get('show_wisata/{id}', 'App\Http\Controllers\UserController@show_wisata')->name('show_wisata');
Route::post('show_wisata/{id}/komentar', 'App\Http\Controllers\UserController@komentar');
Route::post('show_wisata/{id}/rating', 'App\Http\Controllers\UserController@rating');

Route::get('login', 'App\Http\Controllers\AuthController@index')->name('login');
Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::get('register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('register', 'App\Http\Controllers\AuthController@aksiRegister');

Route::group(['middleware' => 'auth', 'middleware' => 'is_admin'], function () {
    Route::resource('admin/categori', 'App\Http\Controllers\Admin\CategoriController');
    Route::resource('admin/user', 'App\Http\Controllers\Admin\UserController');
    Route::resource('admin/wisata', 'App\Http\Controllers\Admin\WisataController');
    Route::get('admin', 'App\Http\Controllers\Admin\AdminController@index')->name('AdminIndex');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('member/wisata', 'App\Http\Controllers\Member\MemberController');
    Route::get('member', 'App\Http\Controllers\Member\MemberController@index')->name('MemberIndex');
    Route::get('logout', 'App\Http\Controllers\AuthController@logout')->name('logout');
});
