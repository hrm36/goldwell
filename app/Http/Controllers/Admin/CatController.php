<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cat;
use App\Product;
use App\Http\Requests\CatRequest as CatRequest;
class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cats = Cat::where('status',1)->get();
        return view('admin.cats.list',['cats'=>$cats], ['flag'=>'cat_p_l']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getcreate()
    {
        $cat_p_ = Cat::where('status',1)->where('type',0)->get();
        return view('admin.cats.create',['cat'=> $cat_p_ , 'flag' => 'cat_p_n']);
    }
   
    public function postcreate(CatRequest $request)
    {
        $cat = Cat::create($request->all());
        $cat->save();
        return redirect(route('create-dm'))->with('thongbao','Thêm chuyên mục mới thành công!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        $cat_ = Cat::find($id);
        $cat_p_ = Cat::where('status',1)->where('type',0)->get();
        return view('admin.cats.edit',['flag' => 'cat_p_l', 'cat' => $cat_, 'catlist' => $cat_p_ ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CatRequest $request, $id)
    {
        $cat_ = Cat::find($id);
        if(isset($cat_)) $cat_->update($request->all());        
        return redirect(route('update-dm',['id' => $cat_->id]))->with('thongbao','Bạn đã sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $_cat = Cat::find($id);
        $cats_ = Cat::where('status',1)->get();
        if(isset($_cat))
        {

            if ($_cat->type == 0){
                $_tmp = Cat::where('cat_id', $_cat->id)->get();
                if(isset($_tmp) && $_tmp->count() != 0){
                   return redirect(route('list-dm'))->with(['cats'=> $cats_, 'flag'=>'cat_p_l', 'err' => "Không thể xóa chuyên mục này vì có chuyên mục con liên quan."]);
                }
            }else{
                $_tmp = Product::where('cat_id', $_cat->id)->get();
                if(isset($_tmp) && $_tmp->count() != 0){
                    return redirect(route('list-dm'))->with(['cats'=> $cats_, 'flag'=>'cat_p_l', 'err' => "Không thể xóa chuyên mục này vì có bài viết liên quan."]);
                }
            }
            $_cat->delete();
        }
        $cats_ = Cat::where('status',1)->get();
        return redirect(route('list-dm'))->with(['cats'=> $cats_, 'flag'=>'cat_p_l', 'thongbao' => "Xóa chuyên mục thành công."]);        
    }
}
