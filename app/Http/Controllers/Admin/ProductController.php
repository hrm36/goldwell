<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductInfoCatRequest as InfoRequest;
use App\Http\Requests\ProductRequest as ProductRequest;
use App\Product;
use App\Cat;
use App\Http\Requests\CatRequest as CatRequest;

class ProductController extends Controller
{
    
    public function getInfoTrangDanhMuc()
    {
        //
        $info_ = config('product.thong-tin');
        return view('admin.products.info_page',['flag' => 'gd', 'info' => $info_]);
    }

    public function updateInfoTrangDanhMuc()
    {
        //
        $info_ = config('product.thong-tin');
        return view('admin.products.update_info_page',['flag' => 'gd', 'info' => $info_]);
    }

     public function storeInfoTrangDanhMuc(InfoRequest $request)
    {
        config(['product.thong-tin.title' => $request->title]);
        config(['product.thong-tin.image' => $request->image]);
        config(['product.thong-tin.content' => $request->content_sp_info]);
        $fp = fopen(base_path() .'/config/product.php' , 'w');
        fwrite($fp, '<?php return ' . var_export(config('product'), true) . ';');
        fclose($fp);
        $info_ = config('product.thong-tin');
        return view('admin.products.info_page',['flag' => 'gd', 'info' => $info_]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      $product_ = Product::where('status', 1)->get();
      return view('admin.products.list',['flag' => 'p_l', 'products' => $product_]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_p = Product::all();
        $cat_p_ = Cat::where('status',1)->where('type',0)->get();
        return view('admin.products.create',['cat'=> $cat_p_ , 'list'=> $list_p , 'flag' => 'p_n']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if (isset($request->sp_botro)){
            $request->merge(['sp_botro' => implode(";", $request->sp_botro)]);  
        }
        Product::create($request->all());
        $product_ = Product::where('status', 1)->get();
        return view('admin.products.list',['flag' => 'p_l', 'products' => $product_]);

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
    public function edit($slug)
    {
        //
        $product_ = Product::where('slug', $slug)->first();
        return view('admin.products.edit',['flag' => 'p_l', 'product' => $product_]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $slug)
    {
        //
        $product_ = Product::where('slug', $slug)->first();
        if (isset($request->sp_botro)){
            $request->merge(['sp_botro' => implode(";", $request->sp_botro)]);  
        }
        $product_->update($request->all());
        $products = Product::where('status', 1)->get();
        return view('admin.products.list',['flag' => 'p_l', 'products' => $products]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        //
        $product_ = Product::where('slug', $slug)->first();
        $product_->delete();
        $products = Product::where('status', 1)->get();
        return view('admin.products.list',['flag' => 'p_l', 'products' => $products]);
    }
}
