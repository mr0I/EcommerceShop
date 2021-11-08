<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleView extends Model
{
    public function articleView()
    {
        return $this->belongsTo(Article::class);
    }

    public static function createViewLog($article) {
        $articleViews= new ArticleView();
        $articleViews->article_id = $article->id;
        $articleViews->titleslug = $article->slug;
        $articleViews->url = request()->url();
        $articleViews->session_id = request()->getSession()->getId();
        $articleViews->user_id = (auth()->check())?auth()->id():null;
        $articleViews->ip = request()->ip();
        $articleViews->agent = request()->header('User-Agent');
        $articleViews->save();
    }
}
