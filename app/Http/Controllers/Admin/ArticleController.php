<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\article_image;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function addArticle(Request $request)
    {
        $res = Article::create($request->data);
        if ($res){
            return response()->json(['result'=>'Done'],200);
        } else{
            return response()->json(['result'=>'Error'],500);
        }
    }

    public function uploadArticleImage(Request $request)
    {
        $year = Carbon::now()->year;
        $fileName = time() . '-' . $year . '-' . $request->file->getClientOriginalName();
        $request->file->move(public_path('uploads').'\article_images', $fileName);

        $res = article_image::create(array_merge([],['image'=>$fileName]));
        if ($res){
            return response()->json(['result' => 'Done' , 'id'=> $res->id] , 200);
        } else {
            return response()->json(['result' => 'Error'] , 500);
        }
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
