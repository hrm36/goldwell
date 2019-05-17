<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use App\Http\Requests\BrandRequest as BrandRequest;
use App\Http\Requests\BrandInfoCatRequest as InfoRequest;
class BrandController extends Controller
{
    
    public function getInfoTrangDanhMuc()
    {
        //
        $info_ = config('brand.thong-tin');
        return view('admin.brand.info_page',['flag' => 'setup_brand', 'info' => $info_]);
    }

    public function updateInfoTrangDanhMuc()
    {
        //
        $info_ = config('brand.thong-tin');
        return view('admin.brand.update_info_page',['flag' => 'setup_brand', 'info' => $info_]);
    }

     public function storeInfoTrangDanhMuc(InfoRequest $request)
    {
        config(['brand.thong-tin.title' => $request->title]);
        config(['brand.thong-tin.image' => $request->image]);
        config(['brand.thong-tin.content' => $request->content_sp_info]);
        $fp = fopen(base_path() .'/config/brand.php' , 'w');
        fwrite($fp, '<?php return ' . var_export(config('brand'), true) . ';');
        fclose($fp);
        $info_ = config('brand.thong-tin');
        return view('admin.brand.info_page',['flag' => 'setup_brand', 'info' => $info_]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      $new_ = Brand::where('status', 1)->get();
      return view('admin.brand.list',['flag' => 'setup_brand', 'brand' => $new_]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('admin.brand.create')->with('flag','brand_n');
    }

    public function postCreate(brandRequest $request) {
        $tintuc = Brand::create($request->all());
        $tintuc->save();
        return redirect(route('create-brand'))->with('thongbao','Thêm bài viết mới thành công!');
    }

    public function getEdit($id)
    {
        $ct = Brand::find($id);       
        return view('admin.brand.edit',['brand' => $ct])->with('flag','brand_n');
    }

    public function postEdit(brandRequest $request,$id) {  
        $ct = Brand::find($id);
        if(isset($ct)) $ct->update($request->all());
        return redirect(route('edit-brand',['id' => $ct->id]))->with('thongbao','Bạn đã sửa thành công!');
    }
    
    public function getDelete($id)
    {
        $_new = Brand::find($id); 
        if (isset($_new)) $_new->delete();
        $brand = Brand::where('status',1)->get();
        return redirect(route('list-brand'))->with('thongbao','Bạn đã xóa thành công!');     
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        brand::create($request->all());
        $new_ = Brand::where('status', 1)->get();
        return view('admin.brand.list',['flag' => 'setup_brand', 'brand' => $new_]);
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
        $new_ = Brand::where('slug', $slug)->first();
        return view('admin.brand.edit',['flag' => 'setup_brand', 'brand' => $new_]);
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
        $new_->update($request->all());
        $new = Brand::where('status', 1)->get();
        return view('admin.brand.list',['flag' => 'setup_brand', 'brand' => $new]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($slug)
    // {
    //     //
    //     $product_ = Product::where('slug', $slug)->first();
    //     $product_->delete();
    //     $products = Product::where('status', 1)->get();
    //     return view('admin.products.list',['flag' => 'p_l', 'products' => $products]);
    // }
}
