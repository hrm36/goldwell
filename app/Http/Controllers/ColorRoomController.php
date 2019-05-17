<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ColorRoom;
use App\Http\Requests\ColorRequest as ColorRequest;
use App\Http\Requests\ColorInfoCatRequest as InfoRequest;
class ColorRoomController extends Controller
{
    
    public function getInfoTrangDanhMuc()
    {
        //
        $info_ = config('color.thong-tin');
        return view('admin.color.info_page',['flag' => 'setup_color', 'info' => $info_]);
    }

    public function updateInfoTrangDanhMuc()
    {
        //
        $info_ = config('color.thong-tin');
        return view('admin.color.update_info_page',['flag' => 'setup_color', 'info' => $info_]);
    }

     public function storeInfoTrangDanhMuc(InfoRequest $request)
    {
        config(['color.thong-tin.title' => $request->title]);
        config(['color.thong-tin.image' => $request->image]);
        config(['color.thong-tin.content' => $request->content_sp_info]);
        $fp = fopen(base_path() .'/config/color.php' , 'w');
        fwrite($fp, '<?php return ' . var_export(config('color'), true) . ';');
        fclose($fp);
        $info_ = config('color.thong-tin');
        return view('admin.color.info_page',['flag' => 'setup_color', 'info' => $info_]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      $new_ = ColorRoom::where('status', 1)->get();
      return view('admin.color.list',['flag' => 'setup_color', 'color' => $new_]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('admin.color.create')->with('flag','color_n');
    }

    public function postCreate(colorRequest $request) {
        $tintuc = ColorRoom::create($request->all());
        $tintuc->save();
        return redirect(route('create-color'))->with('thongbao','Thêm bài viết mới thành công!');
    }

    public function getEdit($id)
    {
        $ct = ColorRoom::find($id);       
        return view('admin.color.edit',['color' => $ct])->with('flag','color_n');
    }

    public function postEdit(colorRequest $request,$id) {  
        $ct = ColorRoom::find($id);
        if(isset($ct)) $ct->update($request->all());
        return redirect(route('edit-color',['id' => $ct->id]))->with('thongbao','Bạn đã sửa thành công!');
    }
    
    public function getDelete($id)
    {
        $_new = ColorRoom::find($id); 
        if (isset($_new)) $_new->delete();
        $color = ColorRoom::where('status',1)->get();
        return redirect(route('list-color'))->with('thongbao','Bạn đã xóa thành công!');     
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        ColorRoom::create($request->all());
        $new_ = ColorRoom::where('status', 1)->get();
        return view('admin.color.list',['flag' => 'setup_color', 'color' => $new_]);
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
        $new_ = color::where('slug', $slug)->first();
        return view('admin.color.edit',['flag' => 'setup_color', 'color' => $new_]);
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
        $new = color::where('status', 1)->get();
        return view('admin.color.list',['flag' => 'setup_color', 'color' => $new]);
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
