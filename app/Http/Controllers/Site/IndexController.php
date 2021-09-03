<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Compare;
use App\Http\Controllers\Controller;
use App\Product;
use function GuzzleHttp\default_ca_bundle;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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

    public function addToCompare(Request $request)
    {
        $user_identity = (Auth::check())? Auth::user()->id : $_SERVER['REMOTE_ADDR'];
        $pid = $request->product_id;

        $compare = Compare::where('userIdentity',$user_identity)->first();

        if ($compare !== null){
            $old_pids = [];
            array_push($old_pids,$compare->pid1);
            array_push($old_pids,$compare->pid2);
            array_push($old_pids,$compare->pid3);
            array_push($old_pids,$compare->pid4);
            if (in_array($pid , $old_pids)){
                return response()->json(['result'=> 'Duplicate'] , 400);
            }

            $pid1 = $compare->pid1;
            $pid2 = $compare->pid2;
            $pid3 = $compare->pid3;
            $pid4 = $compare->pid4;
            if ($pid1==='' || $pid1===null){
                $compare->pid1=$pid;
            } elseif ($pid2==='' || $pid2===null){
                $compare->pid2=$pid;
            }elseif ($pid3==='' || $pid3===null){
                $compare->pid3=$pid;
            }elseif ($pid4==='' || $pid4===null){
                $compare->pid4=$pid;
            } else {
                return response()->json(['result' => 'Full' ] , 200);
            }
            $compare->save();
            return response()->json(['result' => 'Done' ] , 200);
        } else {
            $data = ([
                'userIdentity' => $user_identity,
                'pid1' => $pid
            ]);
            $res = Compare::create($data);
            if ($res){
                return response()->json(['result' => 'Done' ] , 200);
            } else {
                return response()->json(['result' => 'Error' ] , 400);

            }
        }

    }

    public function removeFromCompare(Request $request)
    {
        $user_identity = (Auth::check())? Auth::user()->id : $_SERVER['REMOTE_ADDR'];

        $compare = Compare::where('userIdentity',$user_identity)->first();
        if ($compare !== null){
            switch ($request->product_id){
                case 1:$compare->pid1 = null;break;
                case 2:$compare->pid2 = null;break;
                case 3:$compare->pid3 = null;break;
                case 4:$compare->pid4 = null;break;
                default:$compare->pid1 = null;
            }
            $compare->save();
            return response()->json(['result' => 'Done' ] , 200);
        } else {
            return response()->json(['result' => 'Error' ] , 400);
        }
    }

    public function getCatProducts(Request $request)
    {
        $category_name = $request->name;
        $category_id = Category::where('name',$category_name)->get('id');

        $limit = Config::get('constants.catProductsPerPage');
        $offset = (isset($request->page_num))? (($request->page_num)*$limit) : 0;
        $products = Product::where('category_id',$category_id[0]->id)->skip($offset)
            ->take($limit)->latest('date')->get();

        // Calc Brands
        $brands = [];
        foreach ($products as $product){
            if (! in_array($product->brand , $brands)) array_push($brands,$product->brand);
        }

        return response()->json(['result'=>'Done' ,'products'=>$products , 'brands'=>$brands , 'category_id'=>$category_id ] , 200);
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
