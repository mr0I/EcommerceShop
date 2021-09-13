<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Compare;
use App\Http\Controllers\Controller;
use App\metaproduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use KKomelin\TranslatableStringExporter\Core\Utils\JSON;

class SiteController extends Controller
{

    public function index(Request $request)
    {
        $mobileProducts =DB::table('categories' , 'c')
            ->join('products as p' , 'p.category_id', '=', 'c.id')
            ->where('c.id' , '1')
            ->select('*')
            ->orderBy('date' , 'ASC')
            ->take(10)->get();

        $specialProducts = Product::where('main_price', '<>' , null)->get();

        return view('site/index' , compact('mobileProducts' ,'specialProducts'));
    }

    public function product($slug)
    {
        $product = Product::find($slug);
        if ($product === null) return redirect(url('404'));
        $related_products = Product::where('category_id', $product->category_id)
            ->where('id', '<>' , $product->id)->latest('date')->take(6)->get();

        $meta_product = metaproduct::where('product_id' , $product->id)->where('key','views')->first();
        if ($meta_product !== null){
            $views = $meta_product->value;
            $meta_product->value = ++$views;
            $meta_product->save();
        } else {
            $data = ([
                'product_id' => $product->id,
                'key' => 'views',
                'value' => 1
            ]);
            metaproduct::create($data);
            $views = 1;
        }
        return view('site/product/index' ,compact('product' , 'related_products','views'));
    }

    public function compare_products(){
        $user_identity = (Auth::check())? Auth::user()->id : $_SERVER['REMOTE_ADDR'];
        $compare = Compare::where('userIdentity',$user_identity)->first();

        if ($compare !== null){
            $product1 = ($compare->pid1!== null)? Product::findOrfail($compare->pid1): null;
            $product2 = ($compare->pid2!== null)? Product::findOrfail($compare->pid2): null;
            $product3 = ($compare->pid3!== null)? Product::findOrfail($compare->pid3): null;
            $product4 = ($compare->pid4!== null)? Product::findOrfail($compare->pid4): null;
        } else {
            $product1 = null;
            $product2 = null;
            $product3 = null;
            $product4 = null;
        }

        return view('site/index', compact('product1','product2','product3','product4'));
    }

    public function category(Request $request)
    {
        $category_name = $request->name;
        $category_id = Category::where('name',$category_name)->get('id');
        $all_products = Product::where('category_id',$category_id[0]->id)->get();
        $all_products_count = sizeof($all_products);


        if (!isset($_GET['page'])){
            $limit = Config::get('constants.catProductsPerPage');
        } else {
            $limit = (Config::get('constants.catProductsPerPage')) * intval($_GET['page']) ;
            $limit = ($limit>$all_products_count)? $all_products_count: $limit;
        }
        $offset = 0;

        // sorting filter
        $sortBy = 'date';
        $sorting = 'DESC';
        if (isset($_GET['sortBy'])){
            switch ($_GET['sortBy']){
                case 'cheap':
                    $sortBy = 'price';
                    $sorting = 'ASC';
                    break;
                case 'expensive':
                    $sortBy = 'price';
                    $sorting = 'DESC';
                    break;
                default:
                    $sortBy = 'date';
                    $sorting = 'DESC';
            }
        }

        // brands filter
        $All_brands = [];
        $priceMin = 999999999999999;
        $priceMax = 0;
        foreach ($all_products as $product){
            if (! in_array($product->brand , $All_brands)) array_push($All_brands,$product->brand);
            if($product->price<$priceMin) $priceMin=$product->price;
            if($product->price>$priceMax) $priceMax=$product->price;
        }
        if (isset($_GET['filters'])){
            $filters = json_decode($_GET['filters']);
            $brandsFilters = $filters->brands;
        } else {
            $brandsFilters = $All_brands;
        }

        // price filter
        $min_price =0;
        $max_price =999999999999999;
        if(isset($_GET['filters'])){
            $filters = json_decode($_GET['filters']);
            $priceRange = $filters->price;
            $min_price = str_split($priceRange,';')[0];
            $max_price = str_split($priceRange,';')[1];
        }


        $sorted_products = Product::where('category_id',$category_id[0]->id)
            ->whereIn('brand',$brandsFilters)->whereBetween('price', [$min_price,$max_price])
            ->orderBy($sortBy,$sorting);
        $products = $sorted_products->skip($offset)->take($limit)->get();
        $products_count = Product::all()->count();


        // Calc Brands
        $brands = [];
        foreach ($all_products as $product){
            if (! in_array($product->brand , $brands)) array_push($brands,$product->brand);
        }

        // New Products
        $latest_mobile_products = Product::take(5)->latest('date')->get();

        return view('site/category/index' ,
            compact('products','category_id','brands','products_count','latest_mobile_products'
            ,'priceMin','priceMax'));
    }


    public function restricted(){
        return view('site/restricted');
    }
}
