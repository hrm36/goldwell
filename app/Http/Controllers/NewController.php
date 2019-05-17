<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Http\Requests\NewsRequest as NewsRequest;
use App\Http\Requests\NewsInfoCatRequest as InfoRequest;
class NewController extends Controller
{
    
    public function getInfoTrangDanhMuc()
    {
        //
        $info_ = config('news.thong-tin');
        return view('admin.news.info_page',['flag' => 'setup_news', 'info' => $info_]);
    }

    public function updateInfoTrangDanhMuc()
    {
        //
        $info_ = config('news.thong-tin');
        return view('admin.news.update_info_page',['flag' => 'setup_news', 'info' => $info_]);
    }

     public function storeInfoTrangDanhMuc(InfoRequest $request)
    {
        config(['news.thong-tin.title' => $request->title]);
        config(['news.thong-tin.image' => $request->image]);
        config(['news.thong-tin.content' => $request->content_sp_info]);
        $fp = fopen(base_path() .'/config/news.php' , 'w');
        fwrite($fp, '<?php return ' . var_export(config('news'), true) . ';');
        fclose($fp);
        $info_ = config('news.thong-tin');
        return view('admin.news.info_page',['flag' => 'setup_news', 'info' => $info_]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
      $new_ = News::where('status', 1)->get();
      return view('admin.news.list',['flag' => 'setup_news', 'news' => $new_]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
        return view('admin.news.create')->with('flag','news_n');
    }

    public function postCreate(NewsRequest $request) {
        $tintuc = News::create($request->all());
        $tintuc->save();
        return redirect(route('create-news'))->with('thongbao','Thêm bài viết mới thành công!');
    }

    public function getEdit($id)
    {
        $ct = News::find($id);       
        return view('admin.news.edit',['news' => $ct])->with('flag','news_n');
    }

    public function postEdit(NewsRequest $request,$id) {  
        $ct = News::find($id);
        if(isset($ct)) $ct->update($request->all());
        return redirect(route('edit-news',['id' => $ct->id]))->with('thongbao','Bạn đã sửa thành công!');
    }
    
    public function getDelete($id)
    {
        $_new = News::find($id); 
        if (isset($_new)) $_new->delete();
        $news = News::where('status',1)->get();
        return redirect(route('list-news'))->with('thongbao','Bạn đã xóa thành công!');     
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        News::create($request->all());
        $new_ = News::where('status', 1)->get();
        return view('admin.news.list',['flag' => 'setup_news', 'news' => $new_]);
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
        $new_ = News::where('slug', $slug)->first();
        return view('admin.news.edit',['flag' => 'setup_news', 'news' => $new_]);
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
        $new = News::where('status', 1)->get();
        return view('admin.news.list',['flag' => 'setup_news', 'news' => $new]);
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
