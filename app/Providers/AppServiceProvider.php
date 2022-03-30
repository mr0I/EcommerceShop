<?php

namespace App\Providers;

use App\Category;
use App\Product;
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
        view()->composer(['site.layout.master','site.dashboard.layout.master'], function ($view) {
            $user_identity = (Auth::check())? Auth::user()->id : $_SERVER['REMOTE_ADDR'];
            $wish = wishlist::where('userIdentity',$user_identity)->first();
            if ($wish!==null){
                $old_pids_arr = $wish->pids;
                $arr = preg_replace('/[\[\]\']+/','',
                    str_replace('"','',explode(",", $old_pids_arr)));
                $products = Product::whereIn('id',$arr)->get();

                $wish_list_len = sizeof($products);
            } else {
                $wish_list_len = 0;
            }

            $categories_en = Category::all()->except(8)->pluck('name','id');
            $categories_fa = Category::all()->except(8)->pluck('name_fa','id');
            $logoPath = 'images/site_logo.png';


            $view->with([
                'wish_list_len'=>$wish_list_len,
                'categories_en'=>$categories_en,
                'categories_fa'=>$categories_fa,
                'logoPath'=>$logoPath,
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
