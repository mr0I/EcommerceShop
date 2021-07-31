<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Session;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mobileProducts =DB::table('categories' , 'c')
            ->join('products as p' , 'p.category_id', '=', 'c.id')
            ->where('c.id' , '1')
            ->select('*')
            ->orderBy('date' , 'Desc')
            ->take(10)->get();
        return view('site/index' , compact('mobileProducts'));
    }

    public function changeLang(Request $request){
        session()->forget('lang');
        if ($request->lang !== '' || $request->lang !== null  ){
            session()->put('lang' , $request->lang);
            App::setLocale($request->lang);
            return response()->json(['result'=>'Done','selected_lang'=>$request->lang] , 200);
        } else {
            return response()->json(['result'=>'Error'] , 400);
        }
    }

    public function changeTheme(Request $request){
        session()->forget('theme');
        if ($request->theme !== '' || $request->theme !== null  ){
            Config::set('constants.currentTheme' , $request->theme);
            session()->put('theme' , $request->theme);
            return response()->json(['result'=>'Done','selected_theme'=>$request->theme] , 200);
        } else {
            return response()->json(['result'=>'Error'] , 400);
        }
    }

    public function admin_login()
    {
        return view('site/admin-login');
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
