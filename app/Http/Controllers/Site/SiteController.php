<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\metaproduct;
use App\Product;
use Illuminate\Http\Request;

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
}
