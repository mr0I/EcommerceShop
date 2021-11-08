<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductView extends Model
{
    public function productView()
    {
        return $this->belongsTo(Product::class);
    }

    public static function createViewLog($product) {
        $productViews= new ProductView();
        $productViews->product_id = $product->id;
        $productViews->titleslug = $product->id;
        $productViews->url = request()->url();
        $productViews->session_id = request()->getSession()->getId();
        $productViews->user_id = (auth()->check())?auth()->id():null;
        $productViews->ip = request()->ip();
        $productViews->agent = request()->header('User-Agent');
        $productViews->save();
    }
}
