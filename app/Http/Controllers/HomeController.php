<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Brand;
use App\News;
use App\ColorRoom;
use App\Product;
use App\Cat;
use App\Coll;
use App\Media;
use App\Banner;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function createSlug(Request $request)
    {
        $slug = Str::slug($request->str, '-');
        return response()->json(array('slug'=>$slug), 200);
    }

    public function homePage()
    {
        $_info_p = config('product.thong-tin');
        $_info_n = config('news.thong-tin');
        $_info_b = config('brand.thong-tin');
        $_info_c = config('color.thong-tin');
        $_num_dis = config('system.number_display');

        //get bo suu tap
        $_cls = Coll::orderby('created_at', "DESC")->where('status',1)->take(3)->get();

        $_sls = Banner::where('status', 1)->where('type', 1)->get();
        $_bst = Banner::where('status', 1)->where('type', 2)->take($_num_dis)->get();

        $_videos = Media::orderby('created_at', "DESC")->where('status',1)->where('type',0)->take(5)->get();
        $_videoos = Media::orderby('created_at', "DESC")->where('status',1)->where('type',0)->take(5)->get();
        return view('welcome', ['sls' => $_sls, 'bst' =>  $_bst, 'p'=>$_info_p, 'n'=>$_info_n, 'b'=>$_info_b, 'c'=>$_info_c, 'cls' => $_cls, 'videos' =>$_videos]);
    }

     public function videoPage()
    {
        $_videoos = Media::orderby('created_at', "DESC")->where('status',1)->where('type',0)->take(5)->get();
        return view('font-end.page.video', ['videoos' =>$_videoos]);
    }

    public function getAllGallery()
    {
        $_cls = Coll::orderby('created_at', "DESC")->where('status',1)->paginate(9);
        return view('font-end.page.gallery', ['cls' => $_cls]);
    }

    public function showGallery($slug)
    {
        $_cl = Coll::where('status', 1)->where('slug', $slug)->first();
        if (!isset($_cl)) return abort(404);
        return view('font-end.page.single-gallery', ['cl' => $_cl]);
    }

    public function listPost(Request $request)
    {
        $_path = $request->path();
        switch ($_path) {
            case 'news':
                $_info = config('news.thong-tin');
                $_list = News::where('status', 1)->take(10)->get();
                $_route = 'show-new';
                $_label = 'NEWS & EVENTS';
                break;
            case 'brand':
                $_info = config('brand.thong-tin');
                $_list = Brand::where('status', 1)->take(10)->get();
                $_route = 'show-brand';
                $_label = 'BRAND';
                break;
            case 'color-zoom':
                $_info = config('color.thong-tin');
                $_list = ColorRoom::where('status', 1)->take(10)->get();
                $_route = 'show-color';
                $_label = 'COLOR ZOOM 2019';
                break;
            case 'categories':
                $_info = config('product.thong-tin');
                $_list = Cat::where('status', 1)->where('type', 1)->take(10)->get();
                $_route = 'products';
                $_label = 'CATEGORIES';
                break;
            case 'products':
                $_info = config('product.thong-tin');

                $_cat = Cat::where('status', 1)->where('slug', $request->slug)->first();
                $_info['image'] = (isset($_cat)) ? $_cat->image : "";
                $_info['title'] = (isset($_cat)) ? $_cat->name : "";
                $_info['content'] = (isset($_cat)) ? $_cat->des_s : "";
                $_list = (isset($_cat)) ?  Product::where('status', 1)->where('cat_id', $_cat->id)->take(10)->get() : null;
                $_route = 'show-product';
                $_label = 'PRODUCTS';
                break;              
            default:
                return redirect(route('hompage'));
                break;       
        }
        return view('font-end.page.list', ['info'=>$_info, 'list'=>$_list, 'name_route' =>$_route, '_label' => $_label]);
    }

    public function showPost(Request $request , $slug)
    {
        $_path = $request->path();
        if ($request->is('news/*')) {
            $_info = config('news.thong-tin');
            $_post = News::where('status', 1)->where('slug', $slug)->first();
            $_link = route('news');
        }else if ($request->is('brand/*')) {
            $_info = config('brand.thong-tin');
            $_post = Brand::where('status', 1)->where('slug', $slug)->first();
            $_link = route('brand');
        }else if ($request->is('color/*')) {
            $_info = config('color.thong-tin');
            $_post = ColorRoom::where('status', 1)->where('slug', $slug)->first();
            $_link = route('color');
        }else{
            return redirect(route('homepage'));
        }
        
        if (isset($_post)){
            return view('font-end.page.single-post', ['_post'=>$_post, '_link' =>$_link, '_title' => $_info['title']]);          
        }else{
            abort(404);
        }
    }
    public function showProduct($slug)
    {
        $_product = Product::where('status',1)->where('slug', $slug)->first();

        //SP LIEN QUAN
        $_cat = null;
        if(isset($_product->cat_id)) $_cat = Cat::find($_product->cat_id);  

        
        if (isset($_product)){
            $type = $_product->dis_type;
            if ($type == 2){
                return view('font-end.page.single-product-2', ['_post'=>$_product, 'cat' =>$_cat]);
            }else {
                return view('font-end.page.single-product', ['_post'=>$_product, 'cat' =>$_cat]);
            }
        }
    }
}
