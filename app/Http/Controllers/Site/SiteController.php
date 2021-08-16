<?php

namespace App\Http\Controllers\Site;

use App\Compare;
use App\Http\Controllers\Controller;
use App\metaproduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function product($slug)
    {
        $product = Product::find($slug);
        if ($product === null) return redirect(url('404'));
        $related_products = Product::where('category_id', $product->category_id)
            ->where('id', '<>' , $product->id)->latest('date')->take(6)->get();

        $meta_product = metaproduct::where('product_id' , $product->id)->where('key','views')->first();
        if ($meta_product !== null){
            $views = $meta_product->value;
            $meta_product->value = ++$views;
            $meta_product->save();
        } else {
            $data = ([
                'product_id' => $product->id,
                'key' => 'views',
                'value' => 1
            ]);
            metaproduct::create($data);
            $views = 1;
        }
        return view('site/product/index' ,compact('product' , 'related_products','views'));
    }

    public function restricted(){
        return view('site/restricted');
    }

    public function compare(){
        $user_identity = (Auth::check())? Auth::user()->id : $_SERVER['REMOTE_ADDR'];
        $compare = Compare::where('userIdentity',$user_identity)->first();

        if ($compare !== null){
            $product1 = Product::findOrfail($compare->pid1);
            $product2 = Product::findOrfail($compare->pid2);
            $product3 = Product::findOrfail($compare->pid3);
            $product4 = Product::findOrfail($compare->pid4);
        } else {
            $product1 = null;
            $product2 = null;
            $product3 = null;
            $product4 = null;
        }

        return view('site/compare', compact('product1','product2','product3','product4'));
    }
}
