<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productView()
    {
        return $this->hasMany(ProductView::class);
    }
    public function showProduct()
    {
        if(auth()->id()===null){
            return $this->productView()
                ->where('ip', '=',  request()->ip())->exists();
        }
        return $this->productView()
            ->where(function($VQuery) { $VQuery
                ->where('session_id', '=', request()->getSession()->getId())
                ->orWhere('user_id', '=', (auth()->check()));})->exists();
    }
}
