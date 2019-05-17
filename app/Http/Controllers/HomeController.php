<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function trangChu()
    {
        $_product = config('product.thong-tin');
        $_news = config('news.thong-tin');
        $_list_product = Product::take(5)->get();
        return view('welcome',['info_p'=>$_product, 'info_new'=>$_news, 'l_product'=>$_list_product]);
    }
}
