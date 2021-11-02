<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded=[];

    public function articleImage(){
        return $this->belongsTo(ArticleImage::class);
    }

    public function comment(){
        return $this->hasMany(Comment::class);
    }



    use Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
