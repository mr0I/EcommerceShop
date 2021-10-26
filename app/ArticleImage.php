<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    protected $guarded = [];

    public function article(){
        return $this->hasOne(Article::class);
    }
}
