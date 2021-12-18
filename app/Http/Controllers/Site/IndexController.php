<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Compare;
use App\Http\Controllers\Controller;
use App\metaproduct;
use App\Product;
use App\wishlist;
use function GuzzleHttp\default_ca_bundle;
use function GuzzleHttp\Promise\all;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Session;
use phpDocumentor\Reflection\Types\False_;
use function Sodium\library_version_major;
use \App\Helpers\functions;



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
            //Config::set('constants.currentTheme' , $request->theme);
            session()->put('theme' , $request->theme);
            return response()->json(['result'=>'Done','selected_theme'=>$request->theme] , 200);
        } else {
            return response()->json(['result'=>'Error'] , 400);
        }
    }
//    public function changeLayout(Request $request){
//        session()->forget('layout');
//        if ($request->layout !== '' || $request->layout !== null  ){
//            session()->put('layout' , $request->layout);
//        }
//    }

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

    public function addToWish(Request $request)
    {
        $user_identity = (Auth::check())? Auth::user()->id : $_SERVER['REMOTE_ADDR'];
        $pid = $request->product_id;

        $wish = wishlist::where('userIdentity',$user_identity)->first();

        if ($wish !== null){
            $old_pids = $wish->pids;
            $old_pids_arr = (array) json_decode($old_pids);

            if (in_array($pid , $old_pids_arr)){
                return response()->json(['result'=> 'Duplicate'] , 200);
            }

            array_push($old_pids_arr,$pid);
            $pids = json_encode($old_pids_arr);

            $wish->pids= $pids;
            $wish->save();
            return response()->json(['result' => 'Done' ,'count'=>count($old_pids_arr)] , 200);
        } else {
            $pids = [];
            array_push($pids,$pid);

            $data = ([
                'userIdentity' => $user_identity,
                'pids' => json_encode($pids)
            ]);
            $res = wishlist::create($data);
            if ($res){
                return response()->json(['result' => 'Done' ,'count'=>count($pids)] , 200);
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

    public function removeFromWishList(Request $request)
    {
        $pid = $request->product_id;
        $user_identity = (Auth::check())? Auth::user()->id : $_SERVER['REMOTE_ADDR'];

        $wish = wishlist::where('userIdentity',$user_identity)->first();
        $old_pids = $wish->pids;
        $old_pids_arr = (array) json_decode($old_pids);
        $new_pids_arr=[];
        for($i=0;$i<sizeof($old_pids_arr);$i++){
            if ($old_pids_arr[$i]!==$pid) array_push($new_pids_arr,$old_pids_arr[$i]);
        }
        $pids = json_encode($new_pids_arr);

        $wish->pids= $pids;
        $wish->save();
        return response()->json(['result' => 'Done' ] , 200);
    }

    public function getCatProducts(Request $request)
    {
        $category_name = $request->name;
        $category_id = Category::where('name',$category_name)->get('id');
        $all_products = Product::where('category_id',$category_id[0]->id)->get();
        $all_products_count = sizeof($all_products);

        $initial_limit = Config::get('constants.catProductsPerPage');
        $offset = (intval($request->page_num)>0)? ((intval($request->page_num))*$initial_limit) : 0;
        $limit = ( (intval($offset)+intval($initial_limit))>$all_products_count )? $all_products_count-intval($offset) : $initial_limit;

        // brands filter
        $All_brands = [];
        foreach ($all_products as $product){
            if (! in_array($product->brand , $All_brands)) array_push($All_brands,$product->brand);
        }
        if (is_array($request->brands_filters) && sizeof($request->brands_filters) !== 0){
            $brandsFilters = $request->brands_filters;
        } elseif(isset($_GET['filters'])){
            $filters = json_decode($_GET['filters']);
            $brandsFilters = $filters->brands;
            if(count($brandsFilters)===1 && $brandsFilters[0]==='') $brandsFilters = $All_brands;
        } else {
            $brandsFilters = $All_brands;
        }


        // sorting filter
        if ($request->sort_type!==null){
            $sort_type = $request->sort_type;
        } elseif(isset($_GET['sortBy'])){
            $sort_type = $_GET['sortBy'];
        } else {
            $sort_type = null;
        }
        $sortBy = 'date';
        $sorting = 'DESC';
        if ($sort_type!==null){
            switch ($sort_type){
                case 'cheap':
                    $sortBy = 'price';
                    $sorting = 'ASC';
                    break;
                case 'expensive':
                    $sortBy = 'price';
                    $sorting = 'DESC';
                    break;
                case 'lastest':
                    $sortBy = 'date';
                    $sorting = 'DESC';
                    break;
                default:
                    $sortBy = 'date';
                    $sorting = 'DESC';
            }
        }

        // price filter
        if ($request->min_price!==null && $request->max_price!==null ){
            $min_price =$request->min_price;
            $max_price =$request->max_price;
        } elseif(isset($_GET['filters'])){
            $filters = json_decode($_GET['filters']);
            $priceRange = $filters->price;
            $min_price = $priceRange->min;
            $max_price = $priceRange->max;
        } else{
            $min_price =0;
            $max_price =9999999999;
        }

        // Availability Filter
        if (isset($request->status)){
            if($request->status=='available'){
                $status=['available'];
            } else {
                $status = ['available','not-available'];
            }
        } else if(isset($_GET['filters'])){
            $filters = json_decode($_GET['filters']);
            $st = $filters->status;
            ($st=='available')? $status=['available'] : $status=['available','not-available'];
        } else {
            $status = ['available','not-available'];
        }

        //return response()->json(['res'=>$All_brands,'size'=>sizeof($All_brands)]);
        //return response()->json(['res2'=>$brandsFilters,'size2'=>sizeof($brandsFilters)]);



        if (sizeof($All_brands)===0 || (sizeof($All_brands)===1 && $All_brands[0]==null)){
            $sorted_products = Product::where('category_id',$category_id[0]->id)
                ->whereBetween('price', [$min_price,$max_price])
                ->whereIn('status',$status)
                ->where('disabled','false')
                ->orderBy($sortBy,$sorting);
        } else {
            $sorted_products = Product::where('category_id',$category_id[0]->id)
                ->whereIn('brand',$brandsFilters)
                ->whereBetween('price', [$min_price,$max_price])
                ->whereIn('status',$status)
                ->where('disabled','false')
                ->orderBy($sortBy,$sorting);
        }
        $products = $sorted_products->skip($offset)->take($limit)->get();
        $all_products_count = $sorted_products->count();

        // Calc Brands
        $brands = [];
        foreach ($products as $product){
            if (! in_array($product->brand , $brands)) array_push($brands,$product->brand);
        }

        return response()->json(['result'=>'Done' ,'products'=>$products ,'offset'=>$offset,'$brandsFilters'=>$brandsFilters
            ,'all_products_count'=>$all_products_count] , 200);
    }

    public function getProductInfo(Request $request)
    {
        $product = Product::find($request->pid);
        if ($product!==null){
            $calc_discount = new functions;
            $discount = $calc_discount::calcDiscount($product->main_price,$product->price);
            $meta_product = metaproduct::where('product_id' , $product->id)->where('key','views')->first();
            if ($meta_product !== null){
                $views = $meta_product->value;
            } else {
                $views = 0;
            }

            return response()->json([
                'result'=>'Done',
                'product'=>$product,
                'discount'=>$discount,
                'views'=>$views,
            ] , 200);
        } else{
            return response()->json(['result'=>'Error'] ,400 );
        }
    }

    public function writeLog(Request $request)
    {
        $logs = array(
            "logType" => $request->log_type,
            "logText" => $request->log_text
        );
        $res = Log::error(json_encode($logs),['ip'=> $_SERVER['REMOTE_ADDR']]);
        return response()->json(['result'=>$res] ,200 );
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
