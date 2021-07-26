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

Route::group(['prefix' => 'dashboard', 'namespace' => 'Admin', 'middleware' => 'isAuth'], function () {
    Route::get('/', function (){
        echo 'sddad';
    });
});

Route::group(['namespace' => 'Site'], function () {
    Route::get('/', 'IndexController@index')->name('home');
    Route::post('/changeLang', 'IndexController@changeLang');
    Route::post('/changeTheme', 'IndexController@changeTheme');
    Route::get('/product/{slug}', 'SiteController@product');
    Route::get('/restricted', 'SiteController@restricted');
});

Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');
