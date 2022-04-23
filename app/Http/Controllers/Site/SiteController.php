<?php

namespace App\Http\Controllers\Site;

use App\Article;
use App\article_image;
use App\ArticleView;
use App\Category;
use App\Comment;
use App\Compare;
use App\Helpers\functions;
use App\Http\Controllers\Controller;
use App\Mail\VerifyMail;
use App\metaproduct;
use App\Product;
use App\ProductView;
use App\ShortLink;
use App\wishlist;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use KKomelin\TranslatableStringExporter\Core\Utils\JSON;
use Spatie\Crawler\Crawler;
use Spatie\Sitemap\SitemapGenerator;
use App\Helpers;

class SiteController extends Controller
{


    public function index()
    {
        $mobileProductsCacheKey = 'mobileProducts';
        $mobileAccessoriesProductsCacheKey = 'mobileAccessoriesProducts';
        $laptopProductsCacheKey = 'laptopProducts';
        $tabletProductsCacheKey = 'tabletProducts';
        $articlesCacheKey = 'publishedArticles';
        $cachedmobileProducts = Cache::get($mobileProductsCacheKey);
        $cachedmobileAccessoriesProducts = Cache::get($mobileAccessoriesProductsCacheKey);
        $cachedlaptopProducts = Cache::get($laptopProductsCacheKey);
        $cachedtabletProducts = Cache::get($tabletProductsCacheKey);
        $cachedarticles = Cache::get($articlesCacheKey);

        if ($cachedmobileProducts){
            $mobileProducts = $cachedmobileProducts;
        } else {
            $mobileProducts = Product::where('category_id','1')->orderBy('date','ASC')->take(10)->get();
            Cache::add($mobileProductsCacheKey,$mobileProducts,now()->addMinutes(10));
        }
        if ($cachedmobileAccessoriesProducts){
            $mobileAccessoriesProducts = $cachedmobileAccessoriesProducts;
        } else {
            $mobileAccessoriesProducts = Product::where('category_id','2')->orderBy('date','ASC')->take(10)->get();
            Cache::add($mobileAccessoriesProductsCacheKey,$mobileAccessoriesProducts,now()->addMinutes(10));
        }
        if ($cachedlaptopProducts){
            $laptopProducts = $cachedlaptopProducts;
        } else {
            $laptopProducts = Product::where('category_id','7')->orderBy('date','ASC')->take(10)->get();
            Cache::add($laptopProductsCacheKey,$laptopProducts,now()->addMinutes(10));
        }
        if ($cachedtabletProducts){
            $tabletProducts = $cachedtabletProducts;
        } else {
            $tabletProducts = Product::where('category_id','6')->orderBy('date','ASC')->take(10)->get();
            Cache::add($tabletProductsCacheKey,$tabletProducts,now()->addMinutes(10));
        }


        if ($cachedarticles){
            $articles = $cachedarticles;
        } else {
            $articles = Article::with('articleImage')
                ->where('status','published')->get();
            Cache::add($articlesCacheKey,$articles,now()->addMinutes(10));
        }

        // get random special products
        $randomCat = rand(1,7);
        $specialProducts = Product::where('main_price', '<>' , null)
            ->where('category_id',$randomCat)->take(20)->get();


        return view('site/index' ,
            compact('mobileProducts','mobileAccessoriesProducts',
                'laptopProducts',
                'tabletProducts' ,
                'specialProducts',
                'articles'));
    }

    public function authentication()
    {
        return view('auth/authentication');
    }

    public function singleArticle($slug)
    {
        $article = Article::where('slug',$slug)->first();

        if ($article!==null){
            $comments = Comment::where('article_id',$article->id)->where('status','approved')->get();
            if($article->showArticle()) return view('site/article/single',compact('article','comments'));;

            $article->increment('views');
            ArticleView::createViewLog($article);
            return view('site/article/single',compact('article','comments'));
        } else {
            return redirect('404');
        }

    }

    public function blog()
    {
        $articles = Article::where('status','published')->latest()->paginate(5);
        $popular_articles = Article::where('status','published')
            ->orderBy('views','DESC')->latest()->get();

        return view('site/article/blog',compact('articles','popular_articles'));
    }

    public function product($slug)
    {

        // generate short link
        $shortLink = functions::generateShortLink($slug);


        $product = Product::find($slug);

        if ($product !== null) {
            $related_products = Product::where('category_id', $product->category_id)
                ->where('id', '<>' , $product->id)->latest('date')->take(6)->get();
            $meta_product = metaproduct::where('product_id' , $product->id)->where('key','views')->first();

            if ($meta_product === null){
                $data = ([
                    'product_id' => $product->id,
                    'key' => 'views',
                    'value' => 0
                ]);
                metaproduct::create($data);
                $views = 1;
            } else {
                if ($product->showProduct()) {
                    $views = $meta_product->value;
                    return view('site/product/index',compact('product', 'related_products','views','shortLink'));
                }
                $meta_product->increment('value');
                ProductView::createViewLog($product);

                $views = $meta_product->value;
            }

            return view('site/product/index',compact('product', 'related_products','views','shortLink'));
        } else {
            return redirect(url('404'));
        }
    }

    public function shortenLink($code)
    {
        $result = ShortLink::where('code',$code)->first();
        $url = $result->link;

        return redirect($url);
    }

    public function compare_products(Request $request)
    {
        $pid1 = functions::clearInputs($request->pid1);
        $pid2 = functions::clearInputs($request->pid2);
        $pid3 = functions::clearInputs($request->pid3);
        $pid4 = functions::clearInputs($request->pid4);

        $product1 = null;$product2 = null;$product3 = null;$product4 = null;
        $pattern = '/^(pr-)+\d/';
        if (strlen($pid1) > 0 && preg_match($pattern ,$pid1)) $product1 = Product::find(substr($pid1,3));
        if (strlen($pid2) > 0 && preg_match($pattern ,$pid2)) $product2 = Product::find(substr($pid2,3));
        if (strlen($pid3) > 0 && preg_match($pattern ,$pid3)) $product3 = Product::find(substr($pid3,3));
        if (strlen($pid4) > 0 && preg_match($pattern ,$pid4)) $product4 = Product::find(substr($pid4,3));

        $productsCount = 0;
        if ($product1 !== null) $productsCount++;
        if ($product2 !== null) $productsCount++;
        if ($product3 !== null) $productsCount++;
        if ($product4 !== null) $productsCount++;

        return view('site/compare', compact('product1','product2','product3','product4','productsCount'));
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
            if($product->price < $priceMin) $priceMin=$product->price;
            if($product->price > $priceMax) $priceMax=$product->price;
        }
        if (isset($_GET['filters'])){
            $filters = json_decode($_GET['filters']);
            $brandsFilters = $filters->brands;
            if(count($brandsFilters)===1 && $brandsFilters[0]==='') $brandsFilters = $All_brands;
        } else {
            $brandsFilters = $All_brands;
        }
        $priceMin= ($priceMin===null) ? $priceMin =0 : $priceMin;


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
            ($st=='marketable')? $status=['marketable'] : $status=['marketable','out_of_stock'];
        } else {
            $status = ['marketable','out_of_stock'];
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
        $products = $sorted_products->skip(0)->take($limit)->get();
        $products_count = $sorted_products->count();



        // Calc Brands
        $brands = [];
        foreach ($all_products as $product){
            if (! in_array($product->brand , $brands)) array_push($brands,$product->brand);
        }

        // New Products
        $latest_mobile_products = Product::take(5)->where('category_id',1)->latest('date')->get();
        $latest_mobile_accessories_products = Product::take(5)->where('category_id',2)->latest('date')->get();
        $latest_computer_parts_products = Product::take(5)->where('category_id',3)->latest('date')->get();
        $latest_laptop_accessories_products = Product::take(5)->where('category_id',4)->latest('date')->get();
        $latest_wearable_gadget_products = Product::take(5)->where('category_id',5)->latest('date')->get();
        $latest_tablet_products = Product::take(5)->where('category_id',6)->latest('date')->get();
        $latest_laptop_products = Product::take(5)->where('category_id',7)->latest('date')->get();
        //$latest_office_machines_products = Product::take(5)->where('category_id',8)->latest('date')->get();


        return view('site/category/index' ,
            compact('products','category_id','brands','products_count'
                ,'priceMin','priceMax', 'min_price','max_price',
                'latest_mobile_products',
                'latest_mobile_accessories_products',
                'latest_computer_parts_products',
                'latest_laptop_accessories_products',
                'latest_wearable_gadget_products',
                'latest_tablet_products',
                'latest_laptop_products'
            ));
    }

    public function wishlist(){
        $userIP = functions::getIP();
        $user_identity = (Auth::check())? Auth::user()->id : $userIP;
        $wish = wishlist::where('userIdentity',$user_identity)->get();



        $products = [];
        if(count($wish) !== 0){
            $arr = preg_replace('/[\[\]\']+/','',
                str_replace('"','',explode(",", $wish[0]->pids)));

            $products = Product::whereIn('id',$arr)->paginate(5);
        }

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

    public function search(Request $request)
    {
        $searchPhrase = functions::clearInputs($request->q);

        // Sanitize Search Query
        if ($searchPhrase == '' ||
            strlen($searchPhrase) < 3 ||
            $this->hasOnlySpecialCharater($searchPhrase)){
            return redirect('404');
        }

        if ($request->cat!=='0'){
            $products = Product::where('title','like','%'.$searchPhrase.'%')
                ->where('category_id',$request->cat)->paginate(12);
        } else {
            $products = Product::where('title','like','%'.$searchPhrase.'%')->paginate(12);
        }

        return view('site/search',[
            'products'=>$products,
            'search_query'=>$searchPhrase,
            'category_id'=>$request->cat
        ]);
    }

    private function hasOnlySpecialCharater($str)
    {
        $pattern = "/^[^a-zA-Z0-9ا-ی]+$/";
        return preg_match($pattern, $str);
    }


    public function genSitemap()
    {
        $path = public_path('sitemap.xml');
        SitemapGenerator::create('http://127.0.0.1:8000')
            ->configureCrawler(function (Crawler $crawler) {
                $crawler->setMaximumDepth(3);
            })
            ->writeToFile($path);
    }

    public function restricted(){
        return view('errors/403');
    }

    public function my_account(){
        $user = Auth::user();

        return view('site/dashboard/index',compact('user'));
    }
    public function my_wishlist(){
        $user = Auth::user();

        $user_identity = (Auth::check())? Auth::user()->id : $_SERVER['REMOTE_ADDR'];
        $wish = wishlist::where('userIdentity',$user_identity)->get();

        $products = [];
        if (sizeof($wish)!==0){
            $arr = preg_replace('/[\[\]\']+/','',
                str_replace('"','',explode(",", $wish[0]->pids)));
            $products = Product::whereIn('id',$arr)->paginate(2);
        }

        return view('site/dashboard/my_wishlist',compact('user','products'));
    }
    public function change_password()
    {
        $user = Auth::user();

        return view('site/dashboard/change_password',compact('user'));
    }

    public function mailTest()
    {
        return view('site/test_mail');
    }
    public function sendTestMail(Request $request)
    {
        $user = 'ali';
        try{
            Mail::to($request->target_mail)->send(new VerifyMail($user));
        } catch (\Exception $exception){
            Log::error('Error sending mail',['Error Text'=> $exception->getMessage() ]);
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect()->back()->with('message', 'Email Sent:)');
    }
}
