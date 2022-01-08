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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin',
    'middleware' => ['isAdmin']], function () {
    Route::get('/dashboard', 'AdminContrller@index');
    Route::get('/dashboard/articles', 'AdminContrller@articles');
    Route::get('/dashboard/add_article', 'AdminContrller@addArticle');
    Route::get('/dashboard/edit_article/{article_id}', 'AdminContrller@editArticle');
    Route::resource('articles','ArticleController');
    // Ajax
    Route::post('/addArticle', 'ArticleController@addArticle');
    Route::put('/updateArticle/{article_id}', 'ArticleController@updateArticle');
    Route::post('/uploadArticleImage', 'ArticleController@uploadArticleImage');
    Route::post('/deleteArticle', 'ArticleController@deleteArticle');
});

Route::group(['namespace' => 'Site','middleware' => 'XssSanitization'], function () {
    Route::get('/', 'SiteController@index')->name('home');
    Route::get('/product/{slug}', 'SiteController@product');
    Route::get('/restricted', 'SiteController@restricted');
    Route::get('/compare', 'SiteController@compare_products');
    Route::get('/wishlist', 'SiteController@wishlist');
    Route::get('/category/{name}', 'SiteController@category');
    Route::get('/adminnnnlogin', 'SiteController@adminLogin');
    Route::post('/adminCheckLogin', 'SiteController@adminCheckLogin');
    Route::get('/article/{slug}', 'SiteController@singleArticle');
    Route::get('/blog', 'SiteController@blog');
    Route::post('/storeComment', 'CommentController@store');
    Route::get('/genSitemap', 'SiteController@genSitemap');
    Route::get('/search', 'SiteController@search');
    // Dashboard
    Route::get('/my_account', 'SiteController@my_account')->middleware('isAuth');
    Route::get('/my_account/wishlist', 'SiteController@my_wishlist')->middleware('isAuth');
    Route::get('/my_account/changepassword', 'SiteController@change_password')->middleware('isAuth');
    // Ajax
    Route::get('/dm-admin', 'IndexController@admin_login');
    Route::post('/changeLang', 'IndexController@changeLang');
    Route::post('/changeTheme', 'IndexController@changeTheme');
    Route::post('/changeLayout', 'IndexController@changeLayout');
    Route::post('/addToCompare', 'IndexController@addToCompare');
    Route::post('/addToWish', 'IndexController@addToWish');
    Route::post('/removeFromCompare', 'IndexController@removeFromCompare');
    Route::post('/removeFromWishList', 'IndexController@removeFromWishList');
    Route::post('/getCatProducts/{name}', 'IndexController@getCatProducts');
    Route::post('/getProductInfo', 'IndexController@getProductInfo');
    Route::post('/writeLog', 'IndexController@writeLog');
    Route::post('/updateUserInfo', 'IndexController@updateUserInfo');
    Route::post('/updateUserPass', 'IndexController@updateUserPass');
});


Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
Auth::routes();
