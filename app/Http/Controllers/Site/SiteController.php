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
       // dd($product);
        return view('site/product/index' ,compact('product'));

    }
}
