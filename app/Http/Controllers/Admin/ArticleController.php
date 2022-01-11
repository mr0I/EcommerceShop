<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\articleimage;
use App\Http\Controllers\Controller;
use App\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addArticle(Request $request)
    {
        $article = Article::create(array_merge($request->data,['views'=>0]));
        if ($article){
            $imageID = $article->article_image_id;
            $articleID = $article->id;

            $image = ArticleImage::find($imageID);
            $image->article_id = $articleID;
            $image->save();

            return response()->json(['result'=>'Done'],200);
        } else{
            return response()->json(['result'=>'Error'],400);
        }
    }

    public function updateArticle(Request $request,$article_id)
    {
        $article = Article::find($article_id);
        $old_image_id = $article->article_image_id;
        $new_image_id = $request->data['article_image_id'];

        $update = $article->update($request->data);
        if ($update){
            $imageID = $article->article_image_id;
            $articleID = $article->id;

            $image = ArticleImage::find($imageID);
            $image->article_id = $articleID;
            $image->save();

            if ($old_image_id !== null && $old_image_id != $new_image_id){
                $image = ArticleImage::find($old_image_id);
                @unlink(public_path().'/uploads/article_images/'. $image->image);
                $res2 = $image->delete();
                if ($res2) return response()->json(['result' => 'Done'] , 200);
                else return response()->json(['result' => 'Error'] , 400);
            }
            return response()->json(['result' => 'Done'] , 200);
        } else {
            return response()->json(['result' => 'Error'] , 400);
        }
    }

    public function uploadArticleImage(Request $request)
    {
        $year = Carbon::now()->year;
        $fileName = time() . '-' . $year . '-' . $request->file->getClientOriginalName();
        $request->file->move(public_path('uploads').'\article_images', $fileName);

        $res = ArticleImage::create(array_merge([],['image'=>$fileName]));
        if ($res){
            return response()->json(['result' => 'Done' , 'id'=> $res->id] , 200);
        } else {
            return response()->json(['result' => 'Error'] , 500);
        }
    }

    public function deleteArticle(Request $request)
    {
        $article = Article::find($request->articleId);

        if ($article!==null){
            $image_id = $article->article_image_id;
            $image = ArticleImage::find($image_id);
            @unlink(public_path().'/uploads/article_images/'. $image->image);
            $res = $article->delete();
            if ($res){
                return response()->json(['result' => 'Done'] , 200);
            }
        } else{
            return response()->json(['result' => 'Error'] , 400);
        }

        return response()->json(['result' => 'Error'] , 408);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
