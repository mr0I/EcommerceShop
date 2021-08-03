<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function product($slug)
    {
        $product = Product::find($slug);
        $related_products = Product::where('category_id', $product->category_id)
            ->where('id', '<>' , $product->id)->latest('date')->take(6)->get();
        return view('site/product/index' ,compact('product' , 'related_products'));
    }

    public function restricted(){
        return view('site/restricted');
    }
}
