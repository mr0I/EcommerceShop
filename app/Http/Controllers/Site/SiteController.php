<?php

namespace App\Http\Controllers\Site;

use App\Article;
use App\article_image;
use App\Category;
use App\Comment;
use App\Compare;
use App\Http\Controllers\Controller;
use App\metaproduct;
use App\Product;
use App\wishlist;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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

        $articles = Article::with('articleImage')
            ->where('status','published')->get();

        return view('site/index' ,
            compact('mobileProducts' ,'specialProducts','articles'));
    }

    public function singleArticle($slug)
    {
        $article = Article::where('slug',$slug)->first();

        if ($article!==null){
            $views = $article->views;
            $article->views = ++$views;
            $article->save();

            $comments = Comment::where('article_id',$article->id)->where('status','approved')->get();
            return view('site/article/single',compact('article','comments'));
        } else {
            return redirect('404');
        }
    }

    public function blog()
    {
        $articles = Article::where('status','published')->paginate(2);
        $popular_articles = Article::where('status','published')
            ->orderBy('views','DESC')->latest()->get();

        return view('site/article/blog',compact('articles','popular_articles'));
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

        return view('site/product/index',compact('product', 'related_products','views'));
    }

    public function compare_products(){
        $user_identity = (Auth::check())? Auth::user()->id : $_SERVER['REMOTE_ADDR'];
        $compare = Compare::where('userIdentity',$user_identity)->first();

        if ($compare !== null){
            $product1 = ($compare->pid1!== null)? Product::find($compare->pid1): null;
            $product2 = ($compare->pid2!== null)? Product::find($compare->pid2): null;
            $product3 = ($compare->pid3!== null)? Product::find($compare->pid3): null;
            $product4 = ($compare->pid4!== null)? Product::find($compare->pid4): null;
            // remove old pids
            if($product1===null) $compare->pid1=null;$compare->save();
            if($product2===null) $compare->pid2=null;$compare->save();
            if($product3===null) $compare->pid3=null;$compare->save();
            if($product4===null) $compare->pid4=null;$compare->save();
        } else {
            $product1 = null;
            $product2 = null;
            $product3 = null;
            $product4 = null;
        }

        return view('site/compare', compact('product1','product2','product3','product4'));
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
                case 'lastest':
                    $sortBy = 'date';
                    $sorting = 'DESC';
                    break;
                default:
                    $sortBy = 'date';
                    $sorting = 'DESC';
            }
        }

        // brands filter
        $All_brands = [];
        $priceMin = 9999999999;
        $priceMax = 0;
        foreach ($all_products as $product){
            if (! in_array($product->brand , $All_brands)) array_push($All_brands,$product->brand);
            if($product->price<$priceMin) $priceMin=$product->price;
            if($product->price>$priceMax) $priceMax=$product->price;
        }
        if (isset($_GET['filters'])){
            $filters = json_decode($_GET['filters']);
            $brandsFilters = $filters->brands;
            if(count($brandsFilters)===1 && $brandsFilters[0]==='') $brandsFilters = $All_brands;
        } else {
            $brandsFilters = $All_brands;
        }

        // price filter
        $min_price =0;
        $max_price =9999999999;
        if(isset($_GET['filters'])){
            $filters = json_decode($_GET['filters']);
            $priceRange = $filters->price;
            $min_price = $priceRange->min;
            $max_price = $priceRange->max;
        }

        // Availability Filter
        if(isset($_GET['filters'])){
            $filters = json_decode($_GET['filters']);
            $st = $filters->status;
            ($st=='available')? $status=['available'] : $status=['available','not-available'];
        } else {
            $status = ['available','not-available'];
        }


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


        $products_count = $sorted_products->count();

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

    public function wishlist(){
        $user_identity = (Auth::check())? Auth::user()->id : $_SERVER['REMOTE_ADDR'];
        $wish = wishlist::where('userIdentity',$user_identity)->get();
        $arr = str_replace(array('[',']'),'',explode(",", $wish[0]->pids));

        $products = Product::whereIn('id',$arr)->paginate(5);
        return view('site/wishlist',compact('products'));
    }

    public function adminLogin(){
        if (Auth::check() && Auth::user()->role->name==='Admin') {
            return redirect('admin/dashboard');
        }
        return view('admin/login');
    }

    public function adminCheckLogin(Request $request)
    {
        $user = User::where('email',$request->username)->first();
        if ($user){
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect('admin/dashboard');
            } else{
                Session::flash('loginError','نام کاربری یا رمز عبور اشتباه است :(');
                return back();
            }
        } else{
            Session::flash('loginError','نام کاربری یا رمز عبور اشتباه است :(');
            return back();
        }



    }


    public function restricted(){
        return view('site/restricted');
    }
}
