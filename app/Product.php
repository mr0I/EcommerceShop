<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function category(){
        return $this->belongsTo(Category::class);
    }

//    public function comments(){
//        return $this->belongsTo(Comment::class);
//    }
}
