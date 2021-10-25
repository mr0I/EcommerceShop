<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class article_image extends Model
{
    //protected $table = 'articles_image';
    protected $guarded = [];

    public function article(){
        return $this->hasOne(Article::class);
    }
}
