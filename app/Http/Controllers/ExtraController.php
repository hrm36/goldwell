<?php

namespace App\Http\Controllers;

use App\Extra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExtraRequest as ExtraRequest;
use Session;
use App\Cat;
use App\Product;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $exts = Extra::where('status', 1)->get();
        return view('admin.extra.index', ['flag'=>'list_ext', 'exts' => $exts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $products = Product::orderby('created_at', "DESC")->where('status', 1)->get();
        if ($request->ajax()) 
        {  
           
           if (isset($request->cat_id))
           {
                $cat_id = $request->cat_id;
                if ($cat_id != 'all') {
                    $products = Product::orderby('created_at', "DESC")->where('cat_id', $cat_id)->where('status', 1)->get();
                }
           }
           return view('admin.partials.product-select', ['products' => $products] );
        }
        $cats = Cat::where('status', 1)->where('type', 1)->get();       
        return view('admin.extra.create', ['flag'=>'create_ext', 'cats' => $cats, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExtraRequest $request)
    {
        Extra::create($request->all());
        if ($request->type == 0) {
            Session::flash('success', 'Tạo mới quy trình thành công.');
        }else {
            Session::flash('success', 'Tạo mới công nghệ thành công.');
        }
        return redirect(route('extra.create'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function show(Extra $extra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $products = Product::orderby('created_at', "DESC")->where('status', 1)->get();
        if ($request->ajax()) 
        {  
           $id = $request->id;
           $ext = Extra::find($id);
           if (isset($request->cat_id))
           {
                 $cat_id = $request->cat_id;
                 if ($cat_id != 'all') {
                     $products = Product::orderby('created_at', "DESC")->where('cat_id', $cat_id)->where('status', 1)->get();
                 }
            }
           return view('admin.partials.product-select-2', ['products' => $products, 'ext' => $ext] );
        }         
        $ext = Extra::find($id);
        $cats = Cat::where('status', 1)->where('type', 1)->get();       
        return view('admin.extra.edit', ['flag'=>'list-ext', 'cats' => $cats, 'products' => $products, 'ext' => $ext]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function update(ExtraRequest $request,  $id)
    {
        //
        $ext = Extra::find($id);
        $ext->update($request->all());
        if ($ext ->type == 0) {
            Session::flash('success', 'Lưu thông tin quy trình thành công.');
        }else {
            Session::flash('success', 'Lưu thông tin công nghệ thành công.');
        }
        return redirect(route('extra.edit', ['id'=>$id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Extra  $extra
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ext = Extra::find($id);
        if (isset($ext)) $ext->delete();
        Session::flash('success', 'Xóa thành công.');
        return redirect(route('extra.index')); 
    }
}
