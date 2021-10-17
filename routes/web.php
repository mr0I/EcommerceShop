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
    Route::get('/', 'DashController@index');
});
Route::group(['namespace' => 'Site'], function () {
    Route::get('/', 'SiteController@index')->name('home');
    Route::get('/product/{slug}', 'SiteController@product');
    Route::get('/restricted', 'SiteController@restricted');
    Route::get('/compare', 'SiteController@compare_products');
    Route::get('/wishlist', 'SiteController@wishlist');
    Route::get('/category/{name}', 'SiteController@category');
    Route::get('/adminnnnlogin', 'SiteController@adminLogin');
    // Ajax
    Route::get('/dm-admin', 'IndexController@admin_login');
    Route::post('/changeLang', 'IndexController@changeLang');
    Route::post('/changeTheme', 'IndexController@changeTheme');
    Route::post('/addToCompare', 'IndexController@addToCompare');
    Route::post('/addToWish', 'IndexController@addToWish');
    Route::post('/removeFromCompare', 'IndexController@removeFromCompare');
    Route::post('/removeFromWishList', 'IndexController@removeFromWishList');
    Route::post('/getCatProducts/{name}', 'IndexController@getCatProducts');
    Route::post('/getProductInfo', 'IndexController@getProductInfo');
});

Auth::routes();
