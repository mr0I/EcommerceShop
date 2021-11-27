<?php

namespace App\Providers;

use App\Category;
use App\wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer(['site.layout.master'], function ($view) {
            $user_identity = (Auth::check())? Auth::user()->id : $_SERVER['REMOTE_ADDR'];
            $wish = wishlist::where('userIdentity',$user_identity)->first();
            if ($wish!==null){
                $old_pids_arr = (array) json_decode($wish->pids);
                $wish_list_len = sizeof($old_pids_arr);
            } else{
                $wish_list_len = 0;
            }
            $categories_en = Category::all()->pluck('name','id');
            $categories_fa = Category::all()->pluck('name_fa','id');

            $view->with([
                'wish_list_len'=>$wish_list_len,
                'categories_en'=>$categories_en,
                'categories_fa'=>$categories_fa,
                ]);
        });

        view()->composer(['admin.layout.master'], function ($view) {
            $view->with(['user'=>Auth::user()]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
