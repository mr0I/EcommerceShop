<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'isAdmin'], function () {
    Route::get('/', 'AdminContrller@index');
});


Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'middleware' => 'isAuth'], function () {
    Route::get('/', 'AdminContrller@index');
});
Route::group(['namespace' => 'Site'], function () {
    Route::get('/dm-admin', 'IndexController@admin');
    Route::get('/', 'IndexController@index')->name('home');
    Route::post('/changeLang', 'IndexController@changeLang');
    Route::post('/changeTheme', 'IndexController@changeTheme');
    Route::get('/product/{slug}', 'SiteController@product');
    Route::get('/restricted', 'SiteController@restricted');
});

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
