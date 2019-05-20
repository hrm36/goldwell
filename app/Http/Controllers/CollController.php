<?php

namespace App\Http\Controllers;

use App\Coll;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CollRequest as CollRequest;

class CollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $colls = Coll::where('status', 1)->get();
        return view('admin.colls.list', ['flag'=>'coll_l', 'colls'=>$colls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.colls.create', ['flag'=>'coll_n']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollRequest $request)
    {
        //
        Coll::create($request->all());
        Session::flash('success', 'Tạo mới bộ sưu tập thành công.');
        return redirect(route('coll.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coll  $coll
     * @return \Illuminate\Http\Response
     */
    public function show(Coll $coll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coll  $coll
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $coll = Coll::find($id);
        if (!isset($coll))   abort(404);      
        return view('admin.colls.edit', ['flag'=>'coll_l', 'coll' => $coll]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coll  $coll
     * @return \Illuminate\Http\Response
     */
    public function update(CollRequest $request, $id)
    {
        //
        $coll = Coll::find($id);
        if (!isset($coll))   abort(404);  
        $coll->update($request->all());
        Session::flash('success', 'Update thành công.');     
        return view('admin.colls.edit', ['flag'=>'coll_l', 'coll' => $coll]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coll  $coll
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $coll = Coll::find($id);
        if (isset($coll)) $coll->delete();
        Session::flash('success', 'Xóa thành công.');
        return redirect(route('coll.index')); 
    }
}
