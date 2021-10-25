<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded=[];

    public function article_image(){
        return $this->belongsTo(article_image::class);
    }

}
