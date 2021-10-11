<?php

namespace App\Providers;

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
            $old_pids_arr = (array) json_decode($wish->pids);

            $view->with(['wish_list_len'=>sizeof($old_pids_arr)]);
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
