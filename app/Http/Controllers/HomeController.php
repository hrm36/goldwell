<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
}
