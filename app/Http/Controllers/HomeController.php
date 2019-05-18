<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Brand;
use App\News;
use App\ColorRoom;
use App\Product;
use App\Cat;

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
        return view('welcome', ['p'=>$_info_p, 'n'=>$_info_n, 'b'=>$_info_b, 'c'=>$_info_c]);
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
            case 'products':
                $_info = config('product.thong-tin');
                $_list = Cat::where('status', 1)->where('type', 0)->take(10)->get();
                $_route = 'show-cats';
                $_label = 'PRODUCTS';
                break;            
            default:
                return redirect(route('hompage'));
                break;       
        }
        return view('font-end.page.list', ['info'=>$_info, 'list'=>$_list, 'name_route' =>$_route, '_label' => $_label]);
    }

    public function showPost($slug)
    {
        $_path = $request->path();
        switch ($_path) {
            case 'news/':
                $_info = config('news.thong-tin');
                $_post = News::where('status', 1)->where('slug', $slug)->first();
                $_link = route('news');
                break;
            case 'brand/':
                $_info = config('brand.thong-tin');
                $_post = Brand::where('status', 1)->where('slug', $slug)->first();
                $_link = route('brand');
                break;
            case 'color-zoom/':
                $_info = config('color.thong-tin');
                $_post = ColorRoom::where('status', 1)->where('slug', $slug)->first();
                $_link = route('color');
                break;           
            default:
                return redirect(route('hompage'));
                break;       
        }
        if (isset($_post)){
            return view('font-end.page.single-post', ['_post'=>$_post, '_link' =>$_link, '_title' => $_info['title']]);          
        }else{
            abort(404);
        }
    }
}
