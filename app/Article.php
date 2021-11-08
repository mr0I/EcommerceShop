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

    public function articleView()
    {
        return $this->hasMany(ArticleView::class);
    }

    public function showArticle()
    {
        if(auth()->id()===null){
            return $this->articleView()
                ->where('ip', '=',  request()->ip())->exists();
        }
        return $this->articleView()
            ->where(function($VQuery) { $VQuery
                ->where('session_id', '=', request()->getSession()->getId())
                ->orWhere('user_id', '=', (auth()->check()));})->exists();
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
