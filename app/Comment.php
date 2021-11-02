<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded=[];

    public function article(){
        return $this->belongsTo(Article::class,'article_id');
    }
}
